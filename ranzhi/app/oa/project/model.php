<?php
/**
 * The model file of project module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     project 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class projectModel extends model
{
    /**
     * Get project by id. 
     * 
     * @param  int    $projectID 
     * @access public
     * @return object
     */
    public function getByID($projectID)
    {
        return $this->dao->select('*')->from(TABLE_PROJECT)->where('id')->eq($projectID)->fetch();
    }

    /**
     * getPairs 
     * 
     * @access public
     * @return void
     */
    public function getPairs()
    {
        return $this->dao->select('id,name')->from(TABLE_PROJECT)->where('deleted')->eq(0)->fetchPairs();
    }

    /**
     * Get left menu of project module. 
     * 
     * @param  int    $projectID 
     * @access public
     * @return void
     */
    public function getLeftMenus($projectID = 0)
    {
        $this->lang->menuGroups->task = 'project';

        $menu = "<nav class='menu leftmenu affix'><ul class='nav nav-stacked nav-primary'>";
        if(empty($projects)) $projects = $this->getPairs();

        $leftMenu = array();

        foreach($projects as $id => $project)
        {
            $class = $id == $projectID ? "class='active'" : '';
            $menu .= "<li {$class}>" . html::a(helper::createLink('task', 'browse', "projectID={$id}"), $project);
            
            $menu .= "<div class='actions'>
                        <div class='dropdown'>
                          <button class='btn btn-mini' data-toggle='dropdown'><span class='caret'></span></button>
                          <ul class='dropdown-menu pull-right'>";
                     
            $menu .= "<li>" . html::a(helper::createLink('project', 'edit', "projectID={$id}"), "<i class='icon-edit'> {$this->lang->edit}</i>", "data-toggle='modal'") . '</li>';
            $menu .= "<li>" . html::a(helper::createLink('project', 'delete', "projectID={$id}"), "<i class='icon-remove'> {$this->lang->delete}</i>", "class='deleter'") . '</li>';
            $menu .= "</ul></div></div>";
            
            $menu .= '</li>';
        }
        $isCreateMenu = ($this->app->getModuleName() == 'project' and $this->app->getmethodName() == 'create') ? "class='active'" : ''; 
        $menu .= "<li {$isCreateMenu}>" . html::a(helper::createLink('project', 'create'), $this->lang->project->create, "data-toggle='modal'");

        $menu .= '</ul></nav>';
        return $menu;
    }

    /**
     * create 
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        $project = fixer::input('post')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', helper::now())
            ->get();

        $this->dao->insert(TABLE_PROJECT)->data($project)
            ->autoCheck()
            ->batchCheck($this->config->project->require->create, 'notempty')
            ->exec();

        if(dao::isError()) return false;
        return $this->dao->lastInsertId();
    }

    /**
     * Update project 
     * 
     * @param  int    $projectID 
     * @access public
     * @return bool
     */
    public function update($projectID)
    {
        $project = fixer::input('post')->get();

        $this->dao->update(TABLE_PROJECT)->data($project)
            ->autoCheck()
            ->batchCheck($this->config->project->require->create, 'notempty')
            ->where('id')->eq($projectID)
            ->exec();

        return !dao::isError();
    }
}
