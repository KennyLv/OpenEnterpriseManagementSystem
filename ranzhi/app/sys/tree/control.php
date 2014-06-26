<?php
/**
 * The control file of tree module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: control.php 9825 2014-06-09 02:22:35Z daitingting $
 * @link        http://www.ranzhi.org
 */
class tree extends control
{
    const NEW_CHILD_COUNT = 5;

    /**
     * Browse the categories and print manage links.
     * 
     * @param  string $type 
     * @param  int    $startModule 
     * @param  int    $root 
     * @access public
     * @return void
     */
    public function browse($type = 'article', $startModule = 0, $root = 0)
    {
        if($type == 'article')
        {
            $this->lang->tree->menu = $this->lang->article->menu;
            $this->lang->menuGroups->tree = 'article';
        }
        elseif($type == 'forum')
        {
            $this->lang->category = $this->lang->board;
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }
        elseif($type == 'blog')
        {
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }
        elseif($type == 'announce')
        {
            $this->lang->tree->menu = $this->lang->announce->menu;
            $this->lang->menuGroups->tree = 'announce';
        }
        elseif($type == 'product' and isset($this->lang->product->menu))
        {
            $this->lang->tree->menu = $this->lang->product->menu;
            $this->lang->menuGroups->tree = 'product';
        }
        elseif($type == 'dept')
        {   
            $this->lang->category = $this->lang->dept;
            if(isset($this->lang->setting->menu))
            {
                $this->lang->tree->menu = $this->lang->setting->menu;
                $this->lang->menuGroups->tree = 'setting';
            }
            else
            {
                unset($this->lang->tree->menu);
                $this->lang->menuGroups->tree = 'user';
            }
        }
        elseif(strpos($type, 'doc') !== false)
        {
            $type = 'customdoc';
            $this->lang->tree->menu = $this->loadModel('doc')->getLeftMenus();
            $this->lang->menuGroups->tree = 'doc';
            if($root == 'product' or $root == 'project') $type = $root . 'doc';
        }
        elseif($type == 'area')
        {   
            $this->lang->category = $this->lang->area;
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }
        elseif($type == 'industry')
        {   
            $this->lang->category = $this->lang->industry;
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }
        elseif($type == 'in')
        {
            $this->lang->category = $this->lang->in;
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }
        elseif($type == 'out')
        {
            $this->lang->category = $this->lang->out;
            $this->lang->tree->menu = $this->lang->setting->menu;
            $this->lang->menuGroups->tree = 'setting';
        }

        $this->view->title    = $this->lang->category->common;
        $this->view->type     = $type;
        $this->view->root     = $root;
        $this->view->moduleID = $startModule;
        $this->view->treeMenu = $this->tree->getTreeMenu($type, 0, array('treeModel', 'createManageLink'), $root);
        $this->view->children = $this->tree->getChildren($startModule, $type, $root);

        $this->display();
    }

    /**
     * Edit a category.
     * 
     * @param  int      $categoryID 
     * @access public
     * @return void
     */
    public function edit($categoryID)
    {
        /* Get current category. */
        $category = $this->tree->getById($categoryID);

        /* If type is forum, assign board to category. */
        if($category->type == 'forum') $this->lang->category = $this->lang->board;

        if(!empty($_POST))
        {
            $result = $this->tree->update($categoryID);
            if($result === true) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess));

            $this->send(array('result' => 'fail', 'message' => dao::isError() ? dao::getError() : $result));
        }

        /* Get option menu and remove the families of current category from it. */
        $optionMenu = $this->tree->getOptionMenu($category->type, 0, false, $category->root);
        $families   = $this->tree->getFamily($categoryID, $category->type, $category->root);
        foreach($families as $member) unset($optionMenu[$member]);

        /* Assign. */
        $this->view->category   = $category;
        $this->view->optionMenu = $optionMenu;
        $this->view->aliasAddon = trim("http://" . $this->server->http_host . $this->config->webRoot, '/' ). '/';

        if(strpos('forum,blog', $category->type) !== false) $this->view->aliasAddon .=  $category->type . '/';

        if($category->type == 'forum') 
        {
            $this->lang->menuGroups->tree = 'forum';
            $this->view->users = $this->loadModel('user')->getPairs('admin');
        }
        else if($category->type == 'blog')
        {
            $this->lang->menuGroups->tree = 'blog';
        }
        else if($category->type == 'dept')
        {
            $this->lang->menuGroups->tree = 'user';
            $this->view->users = $this->loadModel('user')->getPairs(null, $category->id);
        }

        /* remove left menu. */
        unset($this->lang->tree->menu);

        $this->display();
    }

    /**
     * Manage children.
     *
     * @param  string    $type 
     * @param  int       $category    the current category id.
     * @param  int       $root
     * @access public
     * @return void
     */
    public function children($type, $category = 0, $root = 0)
    {
        /* If type is forum, assign board to category. */
        if($type == 'forum') $this->lang->category = $this->lang->board;
        if($type == 'dept')
        {
            $this->app->loadLang('user');
            $this->lang->category = $this->lang->dept;
        }

        if(!empty($_POST))
        { 
            $result = $this->tree->manageChildren($type, $this->post->parent, $this->post->children, $root);
            $locate = $this->inLink('browse', "type=$type&category={$this->post->parent}&root=$root");
            if($result === true) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $locate));
            $this->send(array('result' => 'fail', 'message' => dao::isError() ? dao::getError() : $result));
        }

        $this->view->title    = $this->lang->tree->manage;
        $this->view->type     = $type;
        $this->view->root     = $root;
        $this->view->children = $this->tree->getChildren($category, $type, $root);
        $this->view->origins  = $this->tree->getOrigin($category);
        $this->view->parent   = $category;

        $this->display();
    }

    /**
     * Delete a category.
     * 
     * @param  int    $categoryID 
     * @access public
     * @return void
     */
    public function delete($categoryID)
    {
        /* If type is 'forum' and has children, warning. */
        $category = $this->tree->getByID($categoryID);
        $children = $this->tree->getChildren($categoryID, $category->type); 
        if($children) $this->send(array('result' => 'fail', 'message' => $this->lang->tree->hasChildren));
 
        if($this->tree->delete($categoryID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }
}
