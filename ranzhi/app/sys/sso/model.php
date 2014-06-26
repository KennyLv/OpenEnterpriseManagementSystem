<?php
/**
 * The model file of sso module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     sso 
 * @version     $Id: model.php 8305 2014-04-16 09:08:59Z wangyidong $
 * @link        http://www.ranzhi.org
 */
class ssoModel extends model
{
    /**
     * Identify user.
     * 
     * @param  string $entry 
     * @access public
     * @return bool | object 
     */
    public function identify($code, $account, $authcode)
    {
        if(!$this->checkIP($code)) return false;
        $key = $this->getAppKey($code);
        if(!$account or !$authcode or !$key) return false;
  
        $user = $this->dao->select('*')->from(TABLE_USER)->where('account')->eq($account)->fetch();
        if($user)
        {
            $auth = md5($user->password . $key);
            if($auth == $authcode) return $user;
        }

        return false;
    }

    /**
     * Check ip if is allowed.
     * 
     * @param  string $entry 
     * @access public
     * @return bool 
     */
    public function checkIP($code)
    {
        $entry = $this->loadModel('entry')->getByCode($code);
        $ipParts  = explode('.', $_SERVER['REMOTE_ADDR']);
        $allowIPs = explode(',', $entry->ip);

        foreach($allowIPs as $allowIP)
        {
            if($allowIP == '*') return true;
            $allowIPParts = explode('.', $allowIP);
            foreach($allowIPParts as $key => $allowIPPart)
            {
                if($allowIPPart == '*') $allowIPParts[$key] = $ipParts[$key];
            }
            if(implode('.', $allowIPParts) == $_SERVER['REMOTE_ADDR']) return true;
        }
        return false;
    }

    /**
     * Get app key by code.
     * 
     * @param  string    $code 
     * @access public
     * @return string
     */
    public function getAppKey($code)
    {
        return $this->dao->select('`key`')->from(TABLE_ENTRY)->where('code')->eq($code)->fetch('key');
    }

    /**
     * Get sso info by token.
     * 
     * @param  string    $token 
     * @access public
     * @return object
     */
    public function getByToken($token)
    {
        return $this->dao->select('*')->from(TABLE_SSO)->where('token')->eq($token)->fetch();
    }

    /**
     * Create token.
     * 
     * @param  int    $sid 
     * @param  int    $entryID 
     * @access public
     * @return string
     */
    public function createToken($sid, $entryID)
    {
        $data  = new stdClass();
        $data->sid   = $sid;
        $data->entry = $entryID;
        $data->time  = helper::now();
        $data->token = md5($sid . $entryID . helper::now());
        $this->dao->delete()->from(TABLE_SSO)->where('sid')->eq($sid)->andWhere('entry')->eq($entryID)->exec();
        /* Delete the overdue token. */
        $this->dao->delete()->from(TABLE_SSO)->where('time')->lt(date('Y-m-d H:i:s', strtotime("-2 hour")))->exec();
        $this->dao->insert(TABLE_SSO)->data($data)->exec();
        return $data->token;
    }
}
