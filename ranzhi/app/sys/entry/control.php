<?php
/**
 * The control file of entry module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: control.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
class entry extends control
{
    /**
     * Manage all entries.
     * 
     * @access public
     * @return void
     */
    public function admin()
    {
        $this->view->title      = $this->lang->entry->common . $this->lang->colon . $this->lang->entry->admin;
        $this->view->position[] = $this->lang->entry->common;
        $this->view->position[] = $this->lang->entry->admin;
        $this->view->entries    = $this->entry->getEntries();
        $this->display();
    }

    /**
     * Create auth.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        if(!empty($_POST))
        {
            $entryID = $this->entry->create();
            $this->entry->updateLogo($entryID);
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate'=>inlink('admin')));
        }
        $this->view->title      = $this->lang->entry->common . $this->lang->colon . $this->lang->entry->create;
        $this->view->key        = $this->entry->createKey();
        $this->view->position[] = $this->lang->entry->common;
        $this->view->position[] = $this->lang->entry->create;
        $this->display();
    }

    /**
     * Visit entry.
     * 
     * @param  int    $entryID 
     * @param  string $referer 
     * @access public
     * @return void
     */
    public function visit($entryID, $referer = '')
    {
        $referer = !empty($_GET['referer']) ? $this->get->referer : $referer;
        $entry = $this->entry->getById($entryID);
        $login = $entry->login;
        $token = $this->loadModel('sso')->createToken(session_id(), $entryID);

        if(strpos('&', $login) !== false)
        {
            $location = rtrim($login, '&') . "&token=$token";
        }
        else
        {
            $location = rtrim($login, '?') . "?token=$token";
        }

        if(!empty($referer)) $location .= '&referer=' . $referer;
        $this->locate($location);
    }

    /**
     * Logout 
     * 
     * @param  int    $entryID 
     * @access public
     * @return void
     */
    public function logout($entryID)
    {
        $entry  = $this->entry->getById($entryID);
        $logout = $entry->logout;
        $token  = $this->loadModel('sso')->createToken(session_id(), $entryID);

        if(strpos('&', $logout) !== false)
        {
            $location = rtrim($logout, '&') . "&token=$token";
        }
        else
        {
            $location = rtrim($logout, '?') . "?token=$token";
        }

        $this->locate($location);
    }

    /**
     * Edit auth.
     * 
     * @param  string $code 
     * @access public
     * @return void
     */
    public function edit($code)
    {
        if(!empty($_POST))
        {
            $entryID = $this->entry->update($code);
            $this->entry->updateLogo($entryID);
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror()));
            $this->send(array('result' => 'success', 'locate'=>inlink('admin')));
        }

        $entry = $this->entry->getByCode($code);
        if($entry->size != 'max')
        {
            $entry->size   = 'custom';
            $entry->width  = $size->width;
            $entry->height = $size->height;
        }

        $this->view->title      = $this->lang->entry->common . $this->lang->colon . $this->lang->entry->edit;
        $this->view->position[] = $this->lang->entry->common;
        $this->view->position[] = $this->lang->entry->edit;

        $this->view->entry = $entry;
        $this->view->code  = $code;
        $this->display();
    }

    /**
     * Sort entries.
     * 
     * @access public
     * @return void
     */
    public function sort()
    {
        if(!empty($_POST))
        {
            if(!$this->post->name)  die(js::alert($this->lang->entry->error->name));
            if(!$this->post->ip)    die(js::alert($this->lang->entry->error->ip));

            $this->entry->updateEntry($code);
            if(dao::isError()) die(js::error(dao::getError()));
            $this->send(array('result' => 'success', 'locate'=>inlink('admin')));
        }

        $this->view->title      = $this->lang->entry->common . $this->lang->colon . $this->lang->entry->sort;
        $this->view->position[] = $this->lang->entry->common;
        $this->view->position[] = $this->lang->entry->sort;

        $this->view->entries = $this->entry->getEntries();
        $this->display();
    }

    /**
     * Delete entry.
     * 
     * @param  string $code 
     * @param  string $confirm 
     * @access public
     * @return void
     */
    public function delete($code)
    {
        if($this->entry->delete($code)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Get all departments.
     * 
     * @param  string $entry 
     * @access public
     * @return void
     */
    public function depts($entry)
    {
        if($this->post->key) $key = $this->post->key;
        if($this->get->key)  $key = $this->get->key;
        if($this->entry->checkIP($entry) and $this->entry->getAppKey($entry) == $key)
        {
            $depts = $this->entry->getAllDepts();
            $response['status'] = 'success';
            $response['data']   = json_encode($depts);
            $this->send($response);
        }

        $response['status'] = 'fail';
        $response['data']   = 'key error';
        $this->send($response);
    }

    /**
     * Get all users. 
     * 
     * @param  string $entry 
     * @access public
     * @return void
     */
    public function users($entry)
    {
        if($this->post->key) $key = $this->post->key;
        if($this->get->key)  $key = $this->get->key;
        if($this->entry->checkIP($entry) and $this->entry->getAppKey($entry) == $key)
        {
            $depts = $this->entry->getAllUsers();
            $response['status'] = 'success';
            $response['data']   = json_encode($depts);
            $this->send($response);
        }

        $response['status'] = 'fail';
        $response['data']   = 'key error';
        $this->send($response);
    }

    /**
     * Get entry blocks.
     * 
     * @param  int    $entryID 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function blocks($entryID, $index = 0)
    {
        $entry  = $this->entry->getById($entryID);
        $blocks = $this->entry->getBlocksByAPI($entry);

        if(empty($blocks)) return false;

        $blockPairs = array('' => '') + $blocks;

        $block = $this->loadModel('block')->getBlock($index);

        echo "<th>{$this->lang->entry->lblBlock}</th>";
        echo '<td>' . html::select('entryBlock', $blockPairs, ($block and $block->type == 'system') ? $block->blockID : '', "class='form-control' onchange='getBlockParams(this.value, $entryID)'") . '</td>';
        if(isset($block->entryID)) echo "<script>$(function(){getBlockParams($('#entryBlock').val(), {$block->entryID})})</script>";
    }

    /**
     * Set block that is from entry.
     * 
     * @param  int    $index 
     * @param  int    $entryID 
     * @param  int    $blockID 
     * @access public
     * @return void
     */
    public function setBlock($index, $entryID, $blockID)
    {
        $this->app->loadLang('block');
        $type  = 'system';
        $block = isset($this->config->personal->index->block->{'b' . $index}->value) ? json_decode($this->config->personal->index->block->{'b' . $index}->value) : array();

        $entry  = $this->entry->getById($entryID);
        $this->view->params  = $this->entry->getBlockParams($entry, $blockID);
        $this->view->block   = ($block and $block->type == $type) ? $block : array();
        $this->view->index   = $index;
        $this->view->type    = $type;
        $this->view->blockID = $blockID;
        $this->view->entryID = $entryID;
        $this->display();
    }
}
