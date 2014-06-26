<?php
/**
 * The control file of misc of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     misc
 * @version     $Id$
 * @link        http://www.zentao.net
 */
class misc extends control
{
    public function ping()
    {
        die();
    }

    /** 
     * Create qrcode for mobile visit.
     * 
     * @access public
     * @return void
     */
    public function qrcode()
    {   
        if(!extension_loaded('gd'))
        {   
            $this->view->noGDLib = sprintf($this->lang->misc->noGDLib, $loginAPI);
            $this->display();
        }   

        $this->app->loadClass('qrcode');
        QRcode::png($this->server->http_referer, false, 4, 6); 
    }   
}
