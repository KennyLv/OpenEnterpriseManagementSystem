<?php
/**
 * The control file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id: control.php 9916 2014-06-13 06:38:37Z daitingting $
 * @link        http://www.ranzhi.org
 */
class user extends control
{
    /**
     * The referer
     * 
     * @var string
     * @access private
     */
    private $referer;

    /**
     * Register a user. 
     * 
     * @access public
     * @return void
     */
    public function register()
    {
        if(!empty($_POST))
        {
            $this->user->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if(!$this->session->random) $this->session->set('random', md5(time() . mt_rand()));
            If($this->user->login($this->post->account, md5($this->user->createPassword($this->post->password1, $this->post->account) . $this->session->random)))
            {
                $url = $this->post->referer ? urldecode($this->post->referer) : inlink('user', 'control');
                $this->send( array('result' => 'success', 'locate'=>$url) );
            }
        }

        /* Set the referer. */
        if(!isset($_SERVER['HTTP_REFERER']) or strpos($_SERVER['HTTP_REFERER'], 'login.php') != false)
        {
            $referer = urlencode($this->config->webRoot);
        }
        else
        {
            $referer = urlencode($_SERVER['HTTP_REFERER']);
        }

        $this->view->referer = $referer;
        $this->display();
    }

    /**
     * Login.
     * 
     * @param string $referer 
     * @access public
     * @return void
     */
    public function login($referer = '')
    {
        $this->setReferer($referer);

        /* Load mail config for reset password. */
        $this->app->loadConfig('mail');

        $loginLink = $this->createLink('user', 'login');
        $denyLink  = $this->createLink('user', 'deny');
        $regLink   = $this->createLink('user', 'register');

        /* If the user logon already, goto the pre page. */
        if($this->user->isLogon())
        {
            if($this->referer and strpos($loginLink . $denyLink . $regLink, $this->referer) !== false) $this->locate($this->referer);
            $this->locate($this->createLink($this->config->default->module));
            exit;
        }

        /* If the user sumbit post, check the user and then authorize him. */
        if(!empty($_POST))
        {
            if(!$this->user->login($this->post->account, $this->post->password)) $this->send(array('result'=>'fail', 'message' => $this->lang->user->loginFailed));

            /* Goto the referer or to the default module */
            if($this->post->referer != false and strpos($loginLink . $denyLink . $regLink, $this->post->referer) === false)
            {
                $this->send(array('result'=>'success', 'locate'=> urldecode($this->post->referer)));
            }
            else
            {
                $default = $this->config->user->default;
                $this->send(array('result'=>'success', 'locate' => $this->createLink($default->module, $default->method)));
            }
        }

        if(!$this->session->random) $this->session->set('random', md5(time() . mt_rand()));

        $this->view->title   = $this->lang->user->login->common;
        $this->view->referer = $this->referer;

        $this->display();
    }

    /**
     * logout 
     * 
     * @param int $referer 
     * @access public
     * @return void
     */
    public function logout($referer = 0)
    {
        session_destroy();
        $vars = !empty($referer) ? "referer=$referer" : '';
        $this->locate($this->createLink('user', 'login', $vars));
    }

    /**
     * The deny page.
     * 
     * @param mixed $module             the denied module
     * @param mixed $method             the deinied method
     * @param string $refererBeforeDeny the referer of the denied page.
     * @access public
     * @return void
     */
    public function deny($module, $method, $refererBeforeDeny = '')
    {
        $this->app->loadLang($module);
        $this->app->loadLang('index', 'sys');

        $this->setReferer();

        $this->view->title             = $this->lang->user->deny;
        $this->view->module            = $module;
        $this->view->method            = $method;
        $this->view->denyPage          = $this->referer;
        $this->view->refererBeforeDeny = $refererBeforeDeny;

        die($this->display());
    }

    /**
     * The user control panel of the front
     * 
     * @access public
     * @return void
     */
    public function control()
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));
        $this->display();
    }

    /**
     * View current user's profile.
     * 
     * @access public
     * @return void
     */
    public function profile()
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));
        $this->view->title = $this->lang->user->profile;
        $this->view->user  = $this->user->getByAccount($this->app->user->account);
        $this->display();
    }

    /**
     * List threads of one user.
     * 
     * @access public
     * @return void
     */
    public function thread($recTotal = 0, $recPerPage = 10, $pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        /* Load the pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Load the forum lang to change the pager lang items. */
        $this->app->loadLang('forum');

        $this->view->threads = $this->loadModel('thread')->getByUser($this->app->user->account, $pager);
        $this->view->pager   = $pager;

        $this->display();
    }

    /**
     * List replies of one user.
     * 
     * @access public
     * @return void
     */
    public function reply($recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        /* Load pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Load the thread lang thus to rewrite the page lang items. */
        $this->app->loadLang('thread');    

        $this->view->replies = $this->loadModel('reply')->getByUser($this->app->user->account, $pager);
        $this->view->pager   = $pager;

        $this->display();
    }

    /**
     * List message of a user.
     * 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function message($recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->messages = $this->loadModel('message')->getByAccount($this->app->user->account, $pager);
        $this->view->pager    = $pager;

        $this->display();
    }

    /**
     * Create user 
     * 
     * @access public
     * @return void
     */
    public function create()
    {                          
        if(!empty($_POST))     
        {   
            $this->user->create();          
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError())); 
            /* Go to the referer. */        
            $this->send( array('result' => 'success', 'locate'=>inlink('admin')) );
        }                      

        $this->view->treeMenu = $this->loadModel('tree')->getTreeMenu('dept', 0, array('treeModel', 'createDeptAdminLink'));
        $this->view->depts    = $this->tree->getOptionMenu('dept');
        $this->display();      
    }

    /**
     * Edit a user. 
     * 
     * @param  string    $account 
     * @access public
     * @return void
     */
    public function edit($account = '')
    {
        if(!$account or RUN_MODE == 'front') $account = $this->app->user->account;
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));
        if(empty($account)) $account = $this->app->user->account;

        if(!empty($_POST))
        {
            $this->user->update($account);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $locate = RUN_MODE == 'front' ? inlink('profile') : inlink('admin');
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess , 'locate' => $locate));
        }

        $this->view->title    = $this->lang->user->edit;
        $this->view->treeMenu = $this->loadModel('tree')->getTreeMenu('dept', 0, array('treeModel', 'createDeptAdminLink'));
        $this->view->depts    = $this->tree->getOptionMenu('dept');
        $this->view->user     = $this->user->getByAccount($account);
        if(RUN_MODE == 'admin') 
        { 
            $this->display('user', 'edit.admin');
        }
        else
        {
            $this->display();
        }
    }

    /**
     * Delete a user.
     * 
     * @param mixed $userID 
     * @param string $confirm 
     * @access public
     * @return void
     */
    public function delete($account)
    {
        if($this->user->delete($account)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     *  Admin users list.
     *
     * @param  int    $deptID
     * @param  srting $query
     * @param  srting $orderBy
     * @param  int    $recTotal
     * @param  int    $recPerPage
     * @param  int    $pagerID
     * @access public
     * @return void
     */
    public function admin($deptID = 0, $query = '', $orderBy = 'id_asc', $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {
        if($this->post->query) die($this->locate(inlink('admin', "deptID=$deptID&query={$this->post->query}&orderBy=$orderBy&recTotal=0&recPerPage=$recPerPage&pageID=1")));

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->treeMenu = $this->loadModel('tree')->getTreeMenu('dept', 0, array('treeModel', 'createDeptAdminLink'));
        $this->view->depts    = $this->tree->getOptionMenu('dept');
        $this->view->users    = $this->user->getList($deptID, $query, $orderBy, $pager);
        $this->view->query    = $query;
        $this->view->pager    = $pager;
        $this->view->deptID   = $deptID;
        $this->view->orderBy  = $orderBy;

        $this->view->title = $this->lang->user->list;
        $this->display();
    }

    /**
     *  Admin colleague list.
     *
     * @param  int    $deptID
     * @param  srting $query
     * @param  srting $orderBy
     * @param  int    $recTotal
     * @param  int    $recPerPage
     * @param  int    $pagerID
     * @access public
     * @return void
     */
    public function colleague($deptID = 0, $query = '', $orderBy = 'id_asc', $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {
        if($this->post->query) die($this->locate(inlink('colleague', "deptID=$deptID&query={$this->post->query}&orderBy=$orderBy&recTotal=0&recPerPage=$recPerPage&pageID=1")));

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->treeMenu = $this->loadModel('tree')->getTreeMenu('dept', 0, array('treeModel', 'createDeptColleagueLink'));
        $this->view->depts    = $this->tree->getPairs(0, 'dept');
        $this->view->users    = $this->user->getList($deptID, $query, $orderBy, $pager);
        $this->view->query    = $query;
        $this->view->pager    = $pager;
        $this->view->deptID   = $deptID;
        $this->view->orderBy  = $orderBy;

        $this->view->title = $this->lang->user->list;
        $this->display();
    }

    /**
     * forbid a user.
     *
     * @param int    $userID
     * @return viod
     */
    public function forbid($userID)
    {
        if(!$userID) $this->send(array('result'=>'fail', 'message' => $this->lang->user->actionFail));       

        $result = $this->user->forbid($userID);
        if($result) die($this->send(array('result'=>'success', 'locate' => $this->server->http_referer)));

        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Active user 
     * 
     * @param  int    $userID 
     * @access public
     * @return void
     */
    public function active($userID)
    {
        if(!$userID) $this->send(array('result'=>'fail', 'message' => $this->lang->user->actionFail));       

        $result = $this->user->active($userID);
        if($result) die($this->send(array('result'=>'success', 'locate' => $this->server->http_referer)));

        $this->send(array( 'result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * set the referer 
     * 
     * @param  string $referer 
     * @access private
     * @return void
     */
    private function setReferer($referer = '')
    {
        if(!empty($referer))
        {
            $this->referer = helper::safe64Decode($referer);
        }
        else
        {
            $this->referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        }
    }

    /**
     * Change password.
     *
     * @access public
     * @return void
     */
    public function changePassword()
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        if(!empty($_POST))
        {
            $this->user->updatePassword($this->app->user->account);
            if(dao::isError()) $this->send(array( 'result' => 'fail', 'message' => dao::getError() ) );
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess));
        }

        $this->view->user = $this->user->getByAccount($this->app->user->account);
        $this->display();
    }

    /**
     * vcard of a user.
     * 
     * @param  string    $user 
     * @access public
     * @return void
     */
    public function vcard($user)
    {
        $user = $this->user->getByAccount($user);

        $deptList = $this->loadModel('tree')->getPairs(0, 'dept');
        $dept = zget($deptList, $user->dept, ' ');

        $role = zget($this->lang->user->roleList, $user->role, ' ');

        $vcard = "BEGIN:VCARD 
N:{$user->realname}
TITLE:{$dept} {$role}
TEL;TYPE=WORK:{$user->phone}
TEL;TYPE=WORK:{$user->mobile}
ADR;TYPE=HOME:{$user->address}
EMAIL;TYPE=PREF,INTERNET:{$user->email}
END:VCARD";

        $this->app->loadClass('qrcode');
        QRcode::png($vcard, false, 4, 6); 
    }
}
