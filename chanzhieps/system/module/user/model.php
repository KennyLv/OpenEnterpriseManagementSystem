<?php
/**
 * The model file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php
class userModel extends model
{
    /**
     * Get users List.
     *
     * @param object  $pager
     * @access public
     * @return object 
     */
    public function getList($pager = null)
    {
        return $this->dao->select('u.*, o.provider as provider, openID as openID')->from(TABLE_USER)->alias('u')
            ->leftJoin(TABLE_OAUTH)->alias('o')->on('u.account = o.account')->where('1')
            ->beginIF($this->get->user)->andWhere('u.account')->like("%{$this->get->user}%")->fi()
            ->beginIF($this->get->provider)->andWhere('o.provider')->like("%{$this->get->provider}%")->fi()
            ->orderBy('id_asc')
            ->page($pager)
            ->fetchAll('id');
    }

    /**
     * Get user by openID.
     * 
     * @param  int    $openID 
     * @param  int    $provider 
     * @access public
     * @return void
     */
    public function getByOpenID($openID, $provider)
    {
        return $this->dao->select('u.*, o.provider as provider, openID as openID')->from(TABLE_USER)->alias('u')
            ->leftJoin(TABLE_OAUTH)->alias('o')->on('u.account = o.account')
            ->where('o.provider')->eq($provider)
            ->andWhere('o.openID')->eq($openID)
            ->fetch();
    }

    /**
     * Get the account=>relaname pairs.
     * 
     * @param  string $params  admin|noempty
     * @access public
     * @return array
     */
    public function getPairs($params = '')
    {
        $users = $this->dao->select('account, realname')->from(TABLE_USER) 
            ->beginIF(strpos($params, 'admin') !== false)->where('admin')->ne('no')->fi()
            ->orderBy('id_asc')
            ->fetchPairs();

        /* Append empty users. */
        if(strpos($params, 'noempty') === false) $users = array('' => '') + $users;

        return $users;
    }

    /**
     * Get the basic info of some user.
     * 
     * @param mixed $users 
     * @access public
     * @return void
     */
    public function getBasicInfo($users)
    {
        $users = $this->dao->select('account, admin, realname, `join`, last, visits')->from(TABLE_USER)->where('account')->in($users)->fetchAll('account', false);
        if(!$users) return array();

        foreach($users as $account => $user)
        {
            $user->realname  = empty($user->realname) ? $account : $user->realname;
            $user->shortLast = substr($user->last, 5, -3);
            $user->shortJoin = substr($user->join, 5, -3);
        }

        return $users;
    }

    /**
     * Get user by his account.
     * 
     * @param mixed $account
     * @access public
     * @return object           the user.
     */
    public function getByAccount($account)
    {
        return $this->dao->select('*')->from(TABLE_USER)
            ->beginIF(validater::checkEmail($account))->where('email')->eq($account)->fi()
            ->beginIF(!validater::checkEmail($account))->where('account')->eq($account)->fi()
            ->fetch('', false);
    }

    /**
     * Get user list with email and real name.
     * 
     * @param  string|array $users 
     * @access public          
     * @return array           
     */
    public function getRealNameAndEmails($users)
    {
        $users = $this->dao->select('account, email, realname')->from(TABLE_USER)->where('account')->in($users)->fetchAll('account');
        if(!$users) return array();     
        foreach($users as $account => $user) if($user->realname == '') $user->realname = $account; 
        return $users;         
    }

    /**
     * Get user list with real name.
     * 
     * @param  string|array $users 
     * @access public          
     * @return array           
     */
    public function getRealNamePairs($users)
    {
        $userPairs = $this->dao->select('account, realname')->from(TABLE_USER)->where('account')->in($users)->fetchPairs('account');

        foreach($users as $account) if(!isset($userPairs[$account])) $userPairs[$account] = $account;

        if(!$userPairs) return array();     

        foreach($userPairs as $account => $realname) if($realname == '') $userPairs[$account] = $account; 

        return $userPairs;         
    }


    /**
     * Create a user.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        $this->checkPassword();

        $user = fixer::input('post')
            ->setForce('join', date('Y-m-d H:i:s'))
            ->setForce('last', helper::now())
            ->setForce('visits', 1)
            ->setIF($this->post->password1 == false, 'password', '')
            ->setIF($this->cookie->referer != '', 'referer', $this->cookie->referer)
            ->setIF($this->cookie->referer == '', 'referer', '')
            ->remove('admin, ip')
            ->get();
        $user->password = $this->createPassword($this->post->password1, $user->account); 

        $this->dao->insert(TABLE_USER)
            ->data($user, $skip = 'password1,password2')
            ->autoCheck()
            ->batchCheck($this->config->user->require->register, 'notempty')
            ->check('account', 'unique')
            ->check('account', 'account')
            ->check('email', 'email')
            ->check('email', 'unique')
            ->exec();
    }

    /**
     * create wechat user.
     * 
     * @param  object    $fan 
     * @param  string    $public 
     * @access public
     * @return object
     */
    public function createWechatUser($fan, $public)
    {
        if(!isset($fan->subscribe) or $fan->subscribe != 1) return false;
        $fan->openID = $fan->openid;

        $user = new stdclass();
        $user->public   = $public;
        $user->nickname = $fan->nickname;
        $user->realname = $fan->nickname;
        $user->address  = $fan->country . ' ' . $fan->province . ' ' . $fan->city;
        $user->join     = date('Y-m-d H:i:s', $fan->subscribe_time);

        if($fan->sex == 0) $user->gender = 'u';
        if($fan->sex == 1) $user->gender = 'm';
        if($fan->sex == 2) $user->gender = 'f';

        $pulledFan = $this->dao->select('*')->from(TABLE_OAUTH)->where('provider')->eq('wechat')->andWhere('openID')->eq($fan->openID)->fetch();

        if(empty($pulledFan))
        {
            $oauth = new stdclass();
            $oauth->openID   = $fan->openID;
            $oauth->provider = 'wechat';
            $oauth->account  = uniqid('wx_');
            $this->dao->insert(TABLE_OAUTH)->data($oauth)->exec();

            $user->account = $oauth->account;
            $this->dao->insert(TABLE_USER)->data($user, $skip = 'openID,provider')->exec();
        }
        else
        {
            $userInfo = $this->dao->select('*')->from(TABLE_USER)->where('account')->eq($pulledFan->account)->fetch();
            $user->account = $pulledFan->account;
            if(empty($userInfo))
            {
                $this->dao->insert(TABLE_USER)->data($user, $skip = 'openID,provider')->exec();
            }
            elseif(!$userInfo->nickname) 
            {
                $this->dao->update(TABLE_USER)->data($user, $skip = 'openID,provider')->where('account')->eq($pulledFan->account)->exec();
            }
        }

        return $user;
    }

    /**
     * Update an account.
     * 
     * @param  string $account 
     * @access public
     * @return void
     */
    public function update($account)
    {
        /* If the user want to change his password. */
        if($this->post->password1 != false)
        {
            $this->checkPassword();
            if(dao::isError()) return false;

            $password  = $this->createPassword($this->post->password1, $account);
            $this->post->set('password', $password);
        }

        $user = fixer::input('post')
            ->cleanInt('imobile, qq, zipcode')
            ->setDefault('admin', 'no')
            ->remove('ip, account, join, visits')
            ->removeIF(RUN_MODE != 'admin', 'admin')
            ->get();

        return $this->dao->update(TABLE_USER)
            ->data($user, $skip = 'password1,password2')
            ->autoCheck()
            ->batchCheck($this->config->user->require->edit, 'notempty')
            ->check('email', 'email')
            ->check('email', 'unique', "account!='$account'")
            ->checkIF($this->post->gtalk != false, 'gtalk', 'email')
            ->where('account')->eq($account)
            ->exec();
    }

    /**
     * Check the password is valid or not.
     * 
     * @access public
     * @return bool
     */
    public function checkPassword()
    {
        if($this->post->password1 != false)
        {
            if($this->post->password1 != $this->post->password2) dao::$errors['password1'][] = $this->lang->error->passwordsame;
            if(!validater::checkReg($this->post->password1, '|(.){6,}|')) dao::$errors['password1'][] = $this->lang->error->passwordrule;
        }
        else
        {
            dao::$errors['password1'][] = $this->lang->user->inputPassword;
        }
        return !dao::isError();
    }
    
    /**     
     * Update password 
     *          
     * @param  string $account 
     * @access public          
     * @return void
     */     
    public function updatePassword($account)
    { 
        $this->checkPassword();
        if(dao::isError()) return false;

        $user = fixer::input('post')
            ->setIF($this->post->password1 != false, 'password', $this->createPassword($this->post->password1, $account))
            ->remove('password1, password2, ip, account, admin, join, visits')
            ->get();

        $this->dao->update(TABLE_USER)->data($user)->autoCheck()->where('account')->eq($account)->exec();
    }   

    /**
     * Try to login with an account and password.
     * 
     * @param  string    $account 
     * @param  string    $password 
     * @access public
     * @return bool
     */
    public function login($account, $password)
    {
        $user = $this->identify($account, $password);
        if(!$user) return false;

        if(RUN_MODE == 'front') $user->rights = $this->authorize($user);
        $this->session->set('user', $user);
        $this->app->user = $this->session->user;

        return true;
    }

    /**
     * Identify a user.
     * 
     * @param   string $account     the account
     * @param   string $password    the password    the plain password or the md5 hash
     * @access  public
     * @return  object              if is valid user, return the user object.
     */
    public function identify($account, $password)
    {
        if(!$account or !$password) return false;

        /* First get the user from database by account or email. */
        $user = $this->dao->select('*')->from(TABLE_USER)
            ->beginIF(validater::checkEmail($account))->where('email')->eq($account)->fi()
            ->beginIF(!validater::checkEmail($account))->where('account')->eq($account)->fi()
            ->fetch();

        /* Then check the password hash. */
        if(!$user) return false;

        /* Can not login before ten minutes when user is locked. */
        if($user->locked != '0000-00-00 00:00:00')
        {
            $dateDiff = (strtotime($user->locked) - time()) / 60;

            /* Check the type of lock and show it. */
            if($dateDiff > 0 && $dateDiff <= 3)
            {
                $this->lang->user->loginFailed = sprintf($this->lang->user->locked, '3' . $this->lang->date->minute);
                return false;
            }
            elseif($dateDiff > 3)
            {
                $dateDiff = ceil($dateDiff / 60 / 24);
                $this->lang->user->loginFailed = $dateDiff <= 30 ? sprintf($this->lang->user->locked, $dateDiff . $this->lang->date->day) : $this->lang->user->lockedForEver;
                return false;
            }
            else
            {
                $user->fails  = 0;
                $user->locked = '0000-00-00 00:00:00';
            }
        }

        /* The password can be the plain or the password after md5. */
        $oldPassword = $this->createPassword($password, $user->account, $user->join);
        if($oldPassword != $user->password and !$this->compareHashPassword($password, $user) and $user->password != $this->createPassword($password, $user->account))
        {
            $user->fails ++;
            if($user->fails > 2 * 4) $user->locked = date('Y-m-d H:i:s', time() + 3 * 60);
            $this->dao->update(TABLE_USER)->data($user)->where('id')->eq($user->id)->exec();
            return false;
        }

        /* Update user data. */
        $user->ip     = $this->server->remote_addr;
        $user->last   = helper::now();
        $user->fails  = 0;
        $user->visits ++;

        /* Update password when create password by oldCreatePassword function. */
        if($oldPassword == $user->password) $user->password = $this->createPassword($password, $user->account);
        $this->dao->update(TABLE_USER)->data($user)->where('account')->eq($account)->exec();

        $user->realname  = empty($user->realname) ? $account : $user->realname;
        $user->shortLast = substr($user->last, 5, -3);
        $user->shortJoin = substr($user->join, 5, -3);
        unset($_SESSION['random']);

        /* Return him.*/
        return $user;
    }

    /**
     * Authorize a user.
     * 
     * @param   object    $user   the user object.
     * @access  public
     * @return  array
     */
    public function authorize($user)
    {
        $rights = $this->config->rights->guest;
        if($user->account == 'guest') return $rights;

        foreach($this->config->rights->member as $moduleName => $moduleMethods)
        {
            foreach($moduleMethods as $method) $rights[$moduleName][$method] = $method;
        }

        return $rights;
    }

    /**
     * Juage a user is logon or not.
     * 
     * @access public
     * @return bool
     */
    public function isLogon()
    {
        return (isset($_SESSION['user']) and !empty($_SESSION['user']) and $_SESSION['user']->account != 'guest');
    }

    /**
     * Forbid the user
     *
     * @param string $date
     * @param int $userID
     * @access public
     * @return void
     */
    public function forbid($userID, $date)
    {
        $intdate = strtotime("+$date day");

        $format = 'Y-m-d H:i:s';

        $date = date($format,$intdate);
        $this->dao->update(TABLE_USER)->set('locked')->eq($date)->where('id')->eq($userID)->exec();

        return !dao::isError();
    }

    /**
     * Activate the user.
     *
     * @param  int    $userID
     * @access public
     * @return bool
     */
    public function activate($userID)
    {
        $this->dao->update(TABLE_USER)->set('locked')->eq('')->where('id')->eq($userID)->exec();
        return !dao::isError();
    }

    /**
     * Delete user.
     * 
     * @param  string    $account 
     * @param  null      $id          add this param to avoid the warning of php.
     * @access public
     * @return bool
     */
    public function delete($account, $id = null) 
    {
        $user = $this->getByAccount($account);
        if(!$user) return false;

        $this->dao->delete()->from(TABLE_USER)->where('account')->eq($account)->exec();

        return !dao::isError();
    }

    /**
     * update the reset.
     * 
     * @param  string   $account
     * @access public
     * @return void
     */
    public function reset($account, $reset)
    {
        $this->dao->update(TABLE_USER)->set('reset')->eq($reset)->where('account')->eq($account)->exec();
    }

    /**
     * Check the reset.
     * 
     * @param  string   $reset
     * @access public
     * @return void
     */
    public function checkReset($reset)
    {
        $resetTime = substr($reset, -10);
        if((time() - $resetTime) > $this->config->user->resetExpired) return false;
        $user = $this->dao->select('*')->from(TABLE_USER)
            ->where('reset')->eq($reset)
            ->fetch('');
        return $user;
    }

    /**
     * Reset the forgotten password.
     * 
     * @param  string   $reset
     * @param  string   $password 
     * @access public
     * @return void
     */
    public function resetPassword($reset, $password)
    {
        $user = $this->dao->select('*')->from(TABLE_USER)
                ->where('reset')->eq($reset)
                ->fetch();
        
        $this->dao->update(TABLE_USER)
            ->set('password')->eq($this->createPassword($password, $user->account))
            ->set('reset')->eq('')
            ->where('reset')->eq($reset)
            ->exec();
    }

    /**
     * Create a strong password hash with md5.
     *
     * @param  string    $password 
     * @param  string    $account 
     * @param  string    $join   new password is not with join 
     * @access public
     * @return void
     */
    public function createPassword($password, $account, $join = '')
    {
        return md5(md5($password) . $account . $join);
    }

    /**
     * Compare hash password use random
     * 
     * @param  string    $password 
     * @param  object    $user 
     * @access public
     * @return void
     */
    public function compareHashPassword($password, $user)
    {
        return $password == md5($user->password . $this->session->random);
    }

    /**
     * Create the callback address for oauth.
     * 
     * @param  string    $provider 
     * @param  string    $referer 
     * @access public
     * @return string
     */
    public function createOAuthCallbackURL($provider, $referer)
    {
        return commonModel::getSysURL() . helper::createLink('user', 'oauthCallback', "provider=$provider&referer=$referer");
    }

    /**
     * Register an account when using OAuth.
     * 
     * @param  string    $provider 
     * @param  string    $openID 
     * @access public
     * @return void
     */
    public function registerOauthAccount($provider, $openID)
    {
        $user = fixer::input('post')
            ->setForce('join', helper::now())
            ->setForce('last', helper::now())
            ->setForce('visits', 1)
            ->setIF($this->cookie->referer != '', 'referer', $this->cookie->referer)
            ->setIF($this->cookie->referer == '', 'referer', '')
            ->add('password', $this->createPassword(md5(mt_rand()), $openID))     // Set a random password.
            ->remove('admin, ip')
            ->get();

        $this->dao->insert(TABLE_USER)->data($user)
            ->autoCheck()
            ->check('account', 'notempty')
            ->check('account', 'unique')
            ->check('account', 'account')
            ->checkIF($provider != 'qq', 'email', 'notempty')
            ->checkIF($provider != 'qq', 'email', 'unique')
            ->checkIF($provider != 'qq', 'email', 'email')
            ->exec();

        if(dao::isError()) return false;
        return $this->bindOAuthAccount($this->post->account, $provider, $openID);
    }

    /**
     * Bind an OAuth account.
     * 
     * @param  string    $account    the chanzhi system account
     * @param  string    $provider   the OAuth provider
     * @param  string    $openID     the open id from provider
     * @access public
     * @return bool
     */
    public function bindOAuthAccount($account, $provider, $openID)
    {
        if(!$account or !$provider or !$openID) return false;

        return $this->dao->replace(TABLE_OAUTH)
            ->set('account')->eq($account)
            ->set('provider')->eq($provider)
            ->set('openID')->eq($openID)
            ->exec();
    }

    /**
     * Get user by an open id.
     * 
     * @param  string    $provider 
     * @param  string    $openID 
     * @access public
     * @return object|bool
     */
    public function getUserByOpenID($provider, $openID)
    {
        $account = $this->dao->select('account')->from(TABLE_OAUTH)
            ->where('provider')->eq($provider)
            ->andWhere('openID')->eq($openID)
            ->fetch('account');
        if(!$account) return false;
        return $this->getByAccount($account);
    }
}
