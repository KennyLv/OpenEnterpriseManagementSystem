<?php
/**
 * The control file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class rss extends control
{
    /**
     * Output the rss.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $type = $this->get->type != false ? $this->get->type : 'blog';
        $this->loadModel('tree');
        $this->loadModel('article');

        $this->app->loadClass('pager', $static = true);
        $pager = new pager(0, isset($this->config->rss->items) ? $this->config->rss->items : 10, 1);

        $articles = $this->article->getList($type, $this->tree->getFamily(0, $type), 'id_desc', $pager);
        $latestArticle = current((array)$articles);

        $this->view->title    = $this->config->site->name;
        $this->view->desc     = $this->config->site->desc;
        $this->view->siteLink = $this->inlink('browse', "type={$type}");
        $this->view->siteLink = commonModel::getSysURL();

        $this->view->articles = $articles;
        $this->view->lastDate = $latestArticle ? $latestArticle->addedDate : date('Y-m-d H:i:s') . ' +0800';
         
        $this->display();
    }
}
