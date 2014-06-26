<?php
/**
 * The control file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class block extends control
{
    /**
     * Browse blocks admin.
     * 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function admin($recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->session->set('blockList', $this->app->getURI());
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->blocks = $this->block->getList($pager);
        $this->view->title  = $this->lang->block->common;
        $this->view->pager  = $pager;
        $this->display();
    }

    /**
     * Pages admin list.
     * 
     * @access public
     * @return void
     */
    public function pages()
    {
        $this->display();       
    }

    /**
     * Create a block.
     * 
     * @param  string $type    html|php
     * @access public
     * @return void
     */
    public function create($type = 'html')
    {
        if($_POST)
        {
            $this->block->create();
            if(!dao::isError()) $this->send(array('result' => 'success', 'locate' => $this->inlink('admin')));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->type = $type;
        $this->display();
    }

    /**
     * Edit a block.
     * 
     * @param string   $blockID 
     * @param string   $type 
     * @access public
     * @return void
     */
    public function edit($blockID, $type = '')
    {
        if(!$blockID) $this->locate($this->inlink('admin'));

        if($_POST)
        {
            $this->block->update();
            if(!dao::isError()) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->block = $this->block->getByID($blockID);
        $this->view->type  = $this->get->type ? $this->get->type : $this->view->block->type;
        $this->display();
    }

    /**
     * Set the layouts of one region.
     * 
     * @param string   $page 
     * @param string   $region 
     * @access public
     * @return void
     */
    public function setRegion($page, $region)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $result = $this->block->setRegion($page, $region);

            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate' => inlink('pages')));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $blocks = $this->block->getRegionBlocks($page, $region);
        if(empty($blocks)) $blocks = array(new stdclass());

        $this->view->page         = $page;
        $this->view->region       = $region;
        $this->view->blocks       = $blocks;
        $this->view->blockOptions = $this->block->getPairs();

        $this->display();
    }

    /**
     * Delete a block from page region.
     * 
     * @param string $blockID 
     * @param string $confirm 
     * @access public
     * @return void
     */
    public function delete($blockID)
    {
        $result = $this->block->delete($blockID);

        if($result)  $this->send(array('result' => 'success'));
        if(!$result) $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Show block form.
     * 
     * @param  string  $type 
     * @param  int     $id 
     * @access public
     * @return void
     */
    public function blockForm($type, $id = 0)
    {
        if($id > 0) $this->view->block = $this->block->getByID($id); 

        $this->view->type = $type;
        $this->display();
    }
}
