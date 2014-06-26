<?php
/**
 * The control file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class block extends control
{
    /**
     * Admin all blocks. 
     * 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function admin($index = 0)
    {
        $entries = $this->dao->select('*')->from(TABLE_ENTRY)->where('block')->ne('')->fetchAll('id');

        if(!$index) $index = $this->block->getLastKey('sys') + 1;

        $allEntries[''] = '';
        foreach($entries as $id => $entry) $allEntries[$id] = $entry->name;
        //$allEntries['rss']  = 'RSS';
        $allEntries['html'] = 'HTML';

        $this->view->block      = $this->block->getBlock($index);
        $this->view->entries    = $entries;
        $this->view->allEntries = $allEntries;
        $this->view->index      = $index;
        $this->display();
    }

    /**
     * Set params when type is rss or html. 
     * 
     * @param  int    $index 
     * @param  string $type 
     * @access public
     * @return void
     */
    public function set($index, $type)
    {
        if($_POST)
        {
            $this->block->save($index, $type);
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->createLink('index')));
        }

        $block = $this->block->getBlock($index);

        $this->view->type   = $type;
        $this->view->index  = $index;
        $this->view->block  = ($block and $block->type == $type) ? $block : array();
        $this->display();
    }

    /**
     * Print block. 
     * 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function printBlock($index)
    {
        $block = $this->block->getBlock($index);

        if(empty($block)) return false;

        $html = '';
        if($block->type == 'system') $html = $this->block->getEntry($block);
        if($block->type == 'rss')    $html = $this->block->getRss($block);
        if($block->type == 'html')   $html = "<div class='article-content'>" . htmlspecialchars_decode($block->html) .'</div>';

        die($html);
    }

    /**
     * Sort block.
     * 
     * @param  string    $oldOrder 
     * @param  string    $newOrder 
     * @param  string    $app 
     * @access public
     * @return void
     */
    public function sort($oldOrder, $newOrder, $app = 'sys')
    {
        $oldOrder = explode(',', $oldOrder);
        $newOrder = explode(',', $newOrder);

        $orders  = array();
        $account = $this->app->user->account;
        $blocks  = $this->loadModel('setting')->getItems("owner=$account&app=$app&module=index&section=block");
        foreach($blocks as $id => $block)
        {
            $blocks[$block->key] = helper::jsonEncode(json_decode($block->value));
            unset($blocks[$id]);
        }

        foreach($newOrder as $key => $index)
        {
            if(empty($blocks['b' . $oldOrder[$key]])) $this->send(array('result' => 'fail'));
            $sortedBlocks['b' . $index] = $blocks['b' . $oldOrder[$key]];
        }

        $this->loadModel('setting')->deleteItems("owner=$account&app=$app&module=index&section=block");
        $this->setting->setItems($account . ".$app.index.block", $sortedBlocks);

        if(dao::isError()) $this->send(array('result' => 'fail'));
        $this->send(array('result' => 'success'));
    }

    /**
     * Delete block 
     * 
     * @param  int    $index 
     * @param  string $sys 
     * @access public
     * @return void
     */
    public function delete($index, $app = 'sys')
    {
        $this->loadModel('setting')->deleteItems('owner=' . $this->app->user->account . "&app=$app&module=index&section=block&key=b" . $index);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success'));
    }

    /**
     * Display dashboard for app.
     * 
     * @param  string    $appName 
     * @access public
     * @return void
     */
    public function dashboard($appName)
    {
        $this->app->loadLang('index', 'sys');
        $personal = isset($this->config->personal->index) ? $this->config->personal->index : array();
        $blocks   = empty($personal->block) ? array() : (array)$personal->block;
        $inited   = empty($this->config->personal->common->blockInited) ? '' : $this->config->personal->common->blockInited;
        foreach($blocks as $key => $block)
        {
            if($block->app != $appName) unset($blocks[$key]);
        }

        /* Init block when vist index first. */
        if(empty($blocks) and !($inited and $inited->app == $appName and $inited->value))
        {
            if($this->block->initBlock($appName)) die(js::reload());
        }

        foreach($blocks as $key => $block)
        {
            $block->value = json_decode($block->value);

            if(isset($block->value->params))
            {
                $block->value->params->account = $this->app->user->account;
                $block->value->params->uid     = $this->app->user->id;
            }

            $query            = array();
            $query['mode']    = 'getblockdata';
            $query['blockid'] = $block->value->blockID;
            $query['hash']    = '';
            $query['lang']    = $this->app->getClientLang();
            $query['sso']     = '';
            $query['app']     = $appName;
            if(isset($block->value->params)) $query['param'] = base64_encode(json_encode($block->value->params));

            $query = http_build_query($query);
            $sign  = $this->config->requestType == 'PATH_INFO' ? '?' : '&';

            $block->value->blockLink = $this->createLink('block', 'index') . $sign . $query;

            /* Remove the prefix of block key. */
            unset($blocks[$key]);
            $key = str_replace('b', '', $key);
            $blocks[$key] = $block;
        }

        ksort($blocks);

        $this->view->blocks = $blocks;
        $this->display();
    }
}
