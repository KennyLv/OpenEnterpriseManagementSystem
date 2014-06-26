<?php
/**
 * The control file of links module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     links
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class links extends control
{
    /**
     * links profile.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->view->links = $this->config->links;
        $this->display();
    }

    /**
     * set links links.
     * 
     * @access public
     * @return void
     */
    public function admin()
    {
        if(!empty($_POST))
        {
            $result = $this->loadModel('setting')->setItems('system.common.links', (object)$_POST);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }
        $this->view->title = $this->lang->links->common;
        $this->display();
    }
}
