<?php
/**
 * The control file of company module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     company 
 * @version     $Id: control.php 8276 2014-04-15 07:41:26Z guanxiying $
 * @link        http://www.ranzhi.org
 */
class company extends control
{
    /**
     * set company basic info.
     * 
     * @access public
     * @return void
     */
    public function setBasic()
    {
        if(!empty($_POST))
        {
            $now = helper::now();
            $company = fixer::input('post')
            ->stripTags('desc', $this->config->allowedTags->admin)
            ->stripTags('content', $this->config->allowedTags->admin)
            ->get();

            $result = $this->loadModel('setting')->setItems('system.sys.common.company', $company);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->view->title = $this->lang->company->setBasic;
        $this->display();
    }
}
