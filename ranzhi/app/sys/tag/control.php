<?php
/**
 * The control file of tag module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     tag
 * @version     $Id: control.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
class tag extends control
{
    /**
     * Admin tags.
     * 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function admin($orderBy = 'rank_asc', $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $tags = $this->post->tags ? $this->post->tags : array();

        $this->view->title      = $this->lang->tag->admin;
        $this->view->pager      = $pager;
        $this->view->tags       = $this->tag->getList($tags, $orderBy, $pager);
        $this->view->tagOptions = $this->dao->select('tag')->from(TABLE_TAG)->fetchPairs('tag', 'tag');
        $this->view->orderBy    = $orderBy;
        $this->display();
    }   

    /**
     * Set link for a tag.
     * 
     * @param  int    $tagID 
     * @access public
     * @return void
     */
    public function link($tagID)
    {
        if($_POST)
        {
            $this->dao->update(TABLE_TAG)->set('link')->eq($this->post->link)->where('id')->eq($tagID)->exec();
            if(!dao::isError()) $this->send(array('result' => 'success'));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->tag = $this->dao->select('*')->from(TABLE_TAG)->where('id')->eq($tagID)->fetch();
        $this->display();
    }
}
