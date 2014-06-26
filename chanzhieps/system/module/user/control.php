<?php
/**
 * The control file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.chanzhi.org
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
            if($this->user->login($this->post->account, md5($this->user->createPassword($this->post->password1, $this->post->account) . $this->session->random)))
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
        $this->app->loadLang('index');

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
        $this->view->user = $this->user->getByAccount($this->app->user->account);
        $this->display();
    }

    /**
     * List threads of one user.
     * 
     * @access public
     * @return void
     */
    public function thread($pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        /* Load the pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = new pager(0, $this->config->user->recPerPage->thread, $pageID);

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
    public function reply($pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));

        /* Load pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = new pager(0, $this->config->user->recPerPage->reply, $pageID);

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

        if(!empty($_POST))
        {
            $this->user->update($account);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $locate = RUN_MODE == 'front' ? inlink('profile') : inlink('admin');
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess , 'locate' => $locate));
        }

        $this->view->user = $this->user->getByAccount($account);
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
     * @access public
     * @return void
     */
    public function admin()
    {
        if(empty($this->config->oauth->sina)) unset($this->lang->user->menu->weibo);
        if(empty($this->config->oauth->qq))   unset($this->lang->user->menu->qq);

        $get = fixer::input('get')
            ->setDefault('recTotal', 0)
            ->setDefault('recPerPage', 10)
            ->setDefault('pageID', 1)
            ->get();
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($get->recTotal, $get->recPerPage, $get->pageID);

        $users = $this->user->getList($pager);
        
        $this->view->users = $users;
        $this->view->pager = $pager;

        $this->view->title = $this->lang->user->list;
        $this->display();
    }
        
    /**
     * Pull wechat fans. 
     * 
     * @access public
     * @return void
     */
    public function pullWechatFans()
    {
        $this->loadModel('wechat')->pullFans();

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal = 0, $recPerPage =99999, $pageID = 1);
        $users = $this->user->getList($pager);

        $this->wechat->batchPullFanInfo($users);
        $this->send(array('result' => 'success', 'message' => $this->lang->user->pullSuccess));
    }

    /**
     * forbid a user.
     *
     * @param string $date
     * @param int    $userID
     * @return viod
     */
    public function forbid($userID, $date)
    {
        if(!$userID or !isset($this->lang->user->forbidDate[$date])) $this->send(array('result'=>'fail', 'message' => $this->lang->user->forbidFail));       

        $result = $this->user->forbid($userID, $date);
        if($result)
        {
            $this->send(array('result'=>'success', 'message' => $this->lang->user->forbidSuccess));
        }
        else
        {
            $this->send(array('message' => dao::getError()));
        }
    }

    /**
     * Activate a user.
     *
     * @param  int  $userID
     * @access public
     * @return viod
     */
    public function activate($userID)
    {
        if(!$userID) $this->send(array('result'=>'fail', 'message' => $this->lang->user->activateFail));       

        $this->user->activate($userID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result'=>'success', 'message' => $this->lang->user->activateSuccess));
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
     * Reset password.
     *
     * @access public
     * @return void
     */
    public function resetPassword()
    {
        if(!empty($_POST))
        {
            $user = $this->user->getByAccount(trim($this->post->account));
            if($user)
            {
                $account  = $user->account;
                $reset    = md5(str_shuffle(md5($account . mt_rand(0, 99999999) . microtime())) . microtime()) . time();
                $resetURL = "http://". $_SERVER['HTTP_HOST'] . $this->inlink('checkreset', "key=$reset");
                $this->user->reset($account, $reset);
                include('view/resetpassmail.html.php');
                $this->loadModel('mail')->send($account, $this->lang->user->resetmail->subject, $mailContent); 
                if($this->mail->isError()) 
                {
                    $this->send(array('result' => 'fail', 'message' => $this->mail->getError()));
                }
                else
                {
                    $this->send(array('result' => 'success', 'message' => $this->lang->user->resetPassword->success));
                }
            }
            else
            {
                $this->send(array('result' => 'fail', 'message' => $this->lang->user->resetPassword->failed));
            }
        }
        $this->display();
    }

    /**
     * check the reset and reset password. 
     *
     * @access public
     * @return void
     */
    public function checkReset($reset)
    {
        if(!empty($_POST))
        {
            $this->user->checkPassword();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->user->resetPassword($this->post->reset, $this->post->password1); 
            $this->send(array('result' => 'success', 'locate' => inlink('login')));
        }

        if(!$this->user->checkReset($reset))
        {
            header('location:index.html'); 
        }
        else
        {
            $this->view->reset = $reset;
            $this->display();
        }
    }

    /**
     * OAuth login.
     * 
     * @param  string    $provider sina|qq
     * @param  string    $referer  the referer before login
     * @access public
     * @return void
     */
    public function oauthLogin($provider, $referer = '')
    {
        /* Save the provider to session.*/
        $this->session->set('oauthProvider', $provider);

        /* Init OAuth client. */
        $this->app->loadClass('oauth', $static = true);
        $this->config->oauth->$provider = json_decode($this->config->oauth->$provider);
        $client = oauth::factory($provider, $this->config->oauth->$provider, $this->user->createOAuthCallbackURL($provider, $referer));

        /* Create the authorize url and locate to it. */
        $authorizeURL = $client->createAuthorizeAPI();
        $this->locate($authorizeURL);
    }

    /**
     * OAuth callback.
     * 
     * @param  string    $provider
     * @param  string    $referer
     * @access public
     * @return void
     */
    public function oauthCallback($provider, $referer = '')
    {
        /* First check the state and provider fields. */
        if($this->get->state != $this->session->oauthState)  die('state wrong!');
        if($provider != $this->session->oauthProvider)       die('provider wrong.');

        /* Init the OAuth client. */
        $this->app->loadClass('oauth', $static = true);
        $this->config->oauth->$provider = json_decode($this->config->oauth->$provider);
        $client = oauth::factory($provider, $this->config->oauth->$provider, $this->user->createOAuthCallbackURL($provider, $referer));

        /* Begin OAuth authing. */
        $token  = $client->getToken($this->get->code);    // Step1: get token by the code.
        $openID = $client->getOpenID($token);             // Step2: get open id by the token.

        /* Step3: Try to get user by the open id, if got, login him. */
        $user = $this->user->getUserByOpenID($provider, $openID);
        $this->session->set('random', md5(time() . mt_rand()));
        if($user and $this->user->login($user->account, md5($user->password . $this->session->random)))
        {
            if($referer) $this->locate(helper::safe64Decode($referer));

            /* No referer, go to the user control panel. */
            $default = $this->config->user->default;
            $this->locate($this->createLink($default->module, $default->method));
        }

        /* Step4.1: if the provider is sina, display the register or bind page. */
        if($provider == 'sina')
        {
            $this->session->set('oauthOpenID', $openID);                     // Save the openID to session.
            if($this->get->referer != false) $this->setReferer($referer);    // Set the referer.

            $this->view->title   = $this->lang->user->login->common;
            $this->view->referer = $referer;
            die($this->display());
        }

        /* Step4.2: if the provider is qq, register a user with random user. Shit! */
        if($provider == 'qq')
        {
            $openUser = $client->getUserInfo($token, $openID);                    // Get open user info.
            $this->post->set('account', uniqid('qq_'));                           // Create a uniq account.
            $this->post->set('realname', htmlspecialchars($openUser->nickname));  // Set the realname.
            $this->user->registerOauthAccount($provider, $openID);

            $user = $this->user->getUserByOpenID($provider, $openID);
            $this->session->set('random', md5(time() . mt_rand()));
            if($user and $this->user->login($user->account, md5($user->password . $this->session->random)))
            {
                if($referer) $this->locate(helper::safe64Decode($referer));

                /* No referer, go to the user control panel. */
                $default = $this->config->user->default;
                $this->locate($this->createLink($default->module, $default->method));
            }
            else
            {
                die('some error occers.');
            }
        }
    }

    /**
     * Register a user when using oauth login.
     * 
     * @access public
     * @return void
     */
    public function oauthRegister()
    {
        /* If session timeout, locate to login page. */
        if($this->session->oauthProvider == false or $this->session->oauthOpenID == false) $this->send(array('result' => 'success', 'locate'=> inlink('login')));

        if($_POST)
        {
            $this->user->registerOauthAccount($this->session->oauthProvider, $this->session->oauthOpenID);

            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $user = $this->user->getUserByOpenID($this->session->oauthProvider, $this->session->oauthOpenID);
            $this->session->set('random', md5(time() . mt_rand()));
            if($user and $this->user->login($user->account, md5($user->password . $this->session->random)))
            {
                $default = $this->config->user->default;    // Redefine the default module and method in dashbaord scene.

                if($this->post->referer != false) $this->send(array('result'=>'success', 'locate'=> helper::safe64Decode($this->post->referer)));
                if($this->post->referer == false) $this->send(array('result'=>'success', 'locate'=> $this->createLink($default->module, $default->method)));
                exit;
            }

            $this->send(array('result' => 'fail', 'message' => 'I have registered but can\'t login, some error occers.'));
        }
    }

    /**
     * Bind an open id to an account of chanzhi system.
     * 
     * @access public
     * @return void
     */
    public function oauthBind()
    {
        if(!$this->session->random) $this->session->set('random', md5(time() . mt_rand()));
        if($this->user->login($this->post->account, md5($this->user->createPassword($this->post->password, $this->post->account) . $this->session->random)))
        {
            if($this->user->bindOAuthAccount($this->post->account, $this->session->oauthProvider, $this->session->oauthOpenID))
            {
                $default = $this->config->user->default;
                if($this->post->referer != false) $this->send(array('result'=>'success', 'locate'=> helper::safe64Decode($this->post->referer)));
                if($this->post->referer == false) $this->send(array('result'=>'success', 'locate'=> $this->createLink($default->module, $default->method)));
            }
            else
            {
                $this->send(array('result' => 'fail', 'message' => $this->lang->user->oauth->lblBindFailed));
            }
        }

        $this->send(array('result' => 'fail', 'message' => $this->lang->user->loginFailed));
    }
}
