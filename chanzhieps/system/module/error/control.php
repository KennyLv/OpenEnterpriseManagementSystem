<?php
/**
 * The control file of error of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     error
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class error extends control
{
    /**
     * Show 404 error page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        @header("http/1.1 404 not found");
        @header("status: 404 not found");

        $this->display();
    }
}
