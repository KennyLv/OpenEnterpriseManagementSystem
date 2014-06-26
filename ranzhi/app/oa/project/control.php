<?php
/**
 * The control file of project module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     project
 * @version     $Id: control.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhi.org
 */
class project extends control
{
    public function __construct()
    {
        parent::__construct();

        $this->projects = $this->project->getPairs();
        $this->view->moduleMenu = $this->project->getLeftMenus($this->projects);
    }

    /**
     * index page of project module.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        if(empty($this->projects)) $this->locate(inlink('create'));
        $projectID = key((array)$this->projects);
        $this->locate($this->createLink('task','browse', "projectID={$projectID}"));
    }

    /**
     * create a project.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $projectID = $this->project->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->createLink('task', 'browse', "projectID={$projectID}")));
        }

        $this->view->title = $this->lang->project->create;
        $this->display();
    }

    /**
     * Edit project. 
     * 
     * @param  int    $projectID 
     * @access public
     * @return void
     */
    public function edit($projectID)
    {
        if($_POST)
        {
            $this->project->update($projectID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $this->view->title   = $this->lang->project->edit;
        $this->view->project = $this->project->getByID($projectID);
        $this->display();
    }

    /**
     * Delete a project.
     *
     * @param  int    $projectID
     * @access public
     * @return void
     */
    public function delete($projectID)
    {
        $this->project->delete(TABLE_PROJECT, $projectID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success'));
    }
}
