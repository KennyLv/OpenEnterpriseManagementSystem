<?php
/**
 * The control file of page module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     page
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class page extends control
{
    /**
     * The index page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $pages = $this->loadModel('article')->getList('page', 0, $orderBy = null);
        $title = $this->lang->page->list;
        
        $this->view->title = $title;
        $this->view->pages = $pages;

        $this->display();
    }

    /**
     * View an page.
     * 
     * @param  int      $pageID 
     * @access public
     * @return void
     */
    public function view($pageID)
    {
        $page = $this->loadModel('article')->getPageByID($pageID);

        $title    = $page->title;
        $keywords = $page->keywords . ' ' . $this->config->site->keywords;
        $desc     = $page->summary;
        
        $this->view->title    = $title;
        $this->view->keywords = $keywords;
        $this->view->desc     = $desc;
        $this->view->page     = $page;

        $this->dao->update(TABLE_ARTICLE)->set('views = views + 1')->where('id')->eq($page->id)->exec(false);

        $this->display();
    }
}
