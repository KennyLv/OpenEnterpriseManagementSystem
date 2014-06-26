<?php
/**
 * The control file of task module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     task 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class task extends control
{
    /**
     * Construct function. 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /** 
     * The index page, locate to browse.
     * 
     * @access public
     * @return void
     */
    public function index()
    {   
        $this->locate(inlink('browse'));
    }   

    /**
     * Browse task. 
     * 
     * @param  int    $projectID 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function browse($projectID = 0, $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Check project deleted. */
        if($projectID)
        {
            $project = $this->loadModel('project')->getByID($projectID);
            if($project->deleted) $this->locate($this->createLink('project'));
        }

        $this->session->set('taskList', $this->app->getURI(true));

        $this->view->title      = $this->lang->task->browse;
        $this->view->tasks      = $this->task->getList($projectID, $orderBy, $pager);
        $this->view->moduleMenu = $this->project->getLeftMenus($projectID );
        $this->view->pager      = $pager;
        $this->view->orderBy    = $orderBy;
        $this->view->projectID  = $projectID;
        $this->display();
    }

    /**
     * Create a task.
     * 
     * @access public
     * @return void
     */
    public function create($projectID)
    {
        if($_POST)
        {
            $taskID = $this->task->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('task', $taskID, 'Created');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse', "projectID=$projectID")));
        }

        $this->view->title      = $this->lang->task->create;
        $this->view->moduleMenu = $this->loadModel('project')->getLeftMenus($projectID );
        $this->view->projectID  = $projectID;
        $this->view->projects   = $this->project->getPairs();
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Batch create task.
     * 
     * @param  int    $projectID 
     * @access public
     * @return void
     */
    public function batchCreate($projectID)
    {
        if($_POST)
        {
            $taskIDList = $this->task->batchCreate($projectID);

            $this->loadModel('action');
            foreach($taskIDList as $taskID) $this->action->create('task', $taskID, 'Created');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse', "projectID=$projectID")));
        }

        $this->view->moduleMenu = $this->loadModel('project')->getLeftMenus($projectID );
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Edit a task.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function edit($taskID)
    {
        if($_POST)
        {
            $changes = $this->task->update($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(!empty($changes))
            {   
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Edited');
                $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('view', "taskID=$taskID")));
        }

        $this->view->title      = $this->lang->task->edit;
        $this->view->task       = $this->task->getByID($taskID);
        $this->view->moduleMenu = $this->loadModel('project')->getLeftMenus($this->view->task->project);
        $this->view->projects   = $this->project->getPairs();
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * View task. 
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function view($taskID)
    {
        $task = $this->task->getByID($taskID);

        $this->view->moduleMenu = $this->loadModel('project')->getLeftMenus($task->project);
        $this->view->projects   = $this->project->getPairs();
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->view->task       = $task;

        $this->display();
    }

    /**
     * Finish task.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function finish($taskID) 
    {
        if($_POST)
        {
            $changes = $this->task->finish($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Finished', $this->post->comment);
                $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $task = $this->task->getByID($taskID);

        $this->view->title  = $task->name;
        $this->view->taskID = $taskID;
        $this->view->task   = $task;
        $this->view->users  = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Update assign of task.
     *
     * @param  int    $taskID
     * @access public
     * @return void
     */
    public function assignTo($taskID)
    {
        if($_POST)
        {
            $changes = $this->task->assign($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Assigned', $this->post->comment, $this->post->assignedTo);
                $this->action->logHistory($actionID, $changes);
            }
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $task = $this->task->getByID($taskID);

        $this->view->title  = $task->name;
        $this->view->taskID = $taskID;
        $this->view->task   = $task;
        $this->view->users  = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Activate task. 
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function activate($taskID)
    {
        if($_POST)
        {
            $changes = $this->task->activate($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Activated', $this->post->comment);
                $this->action->logHistory($actionID, $changes);
            }
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }
        $this->view->title = $this->lang->task->activate;
        $this->view->task  = $this->task->getByID($taskID);
        $this->view->users = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Cancel task. 
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function cancel($taskID)
    {
        if($_POST)
        {
            $changes = $this->task->cancel($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Canceled', $this->post->comment);
                $this->action->logHistory($actionID, $changes);
            }
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $this->view->title  = $this->lang->task->cancel;
        $this->view->taskID = $taskID;
        $this->display();
    }

    /**
     * Close task. 
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function close($taskID)
    {
        if($_POST)
        {
            $changes = $this->task->close($taskID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $task     = $this->task->getByID($taskID);
                $actionID = $this->loadModel('action')->create('task', $taskID, 'Closed', $this->post->comment, $this->lang->task->reasonList[$task->closedReason]);
                $this->action->logHistory($actionID, $changes);
            }
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }
        $this->view->title  = $this->lang->task->close;
        $this->view->taskID = $taskID;
        $this->display();
    }

    /**
     * Delete task 
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function delete($taskID)
    {
        $this->task->delete(TABLE_TASK, $taskID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'massage' => dao::getError()));

        $link = $this->session->taskList ? $this->session->taskList : inlink('browse');
        $this->send(array('result' => 'success', 'locate' => $link));
    }

    public function kanban($projectID = 0)
    {
        $this->view->tasks = $this->task->getList($projectID);
        $this->view->title      = $this->lang->task->browse;
        $this->view->projectID  = $projectID;
        $this->display();
    }
}
