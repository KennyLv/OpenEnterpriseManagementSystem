<?php
/**
 * The control file of forum module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     forum
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class forum extends control
{
    /**
     * The index page of forum.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $boards = $this->forum->getBoards();
        $this->view->title    = $this->lang->forumHome;
        $this->view->boards   = $boards;

        $this->display();
    }

    /**
     * The board page.
     * 
     * @param int    $boardID       the board id
     * @param int    $pageID        the current page id
     * @access public
     * @return void
     */
    public function board($boardID = 0, $pageID = 1)
    {
        $board = $this->loadModel('tree')->getByID($boardID, 'forum');
        if(!$board) die(js::locate('back'));
 
        /* Get common threads. */
        $this->app->loadClass('pager', $static = true);
        $pager   = new pager(0, $this->config->forum->recPerPage, $pageID);
        $threads = $this->loadModel('thread')->getList($board->id, $orderBy = 'repliedDate_desc', $pager);

        $this->view->title    = $board->name;
        $this->view->keywords = $board->keywords . '' . $this->config->site->keywords;
        $this->view->desc     = strip_tags($board->desc);
        $this->view->board    = $board;
        $this->view->sticks   = $this->thread->getSticks($board->id);
        $this->view->threads  = $threads;
        $this->view->pager    = $pager;

        $this->display();
    }

    /**
     * The admin page of board.
     * 
     * @param int       $boardID 
     * @param string    $orderBy 
     * @param int       $recTotal 
     * @param int       $recPerPage 
     * @param int       $pageID 
     * @access public
     * @return void
     */
    public function admin($boardID = 0, $orderBy = 'repliedDate_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $boards  = $this->loadModel('tree')->getFamily($boardID, 'forum');
        $threads = $boards ? $this->loadModel('thread')->getList($boards, $orderBy, $pager) : array();

        if($this->get->tab == 'feedback')
        {
            $this->lang->menuGroups->forum = 'feedback';
            $this->lang->forum->menu       = $this->lang->feedback->menu;
        }

        $this->view->boardID  = $boardID;
        $this->view->orderBy  = $orderBy;
        $this->view->board    = $this->tree->getByID($boardID, 'forum');
        $this->view->title    = $this->view->board ? $this->view->board->name : $this->lang->forum->admin;
        $this->view->threads  = $threads;
        $this->view->pager    = $pager;

        $this->display();
    }

    /**
     * Update stats of boards and threads.
     * 
     * @access public
     * @return void
     */
    public function update()
    {
        if($_POST)
        {
            $this->forum->updateStats(); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->forum->successUpdate));
        }

        $this->view->title = $this->lang->forum->update;
        $this->display();
    }
}
