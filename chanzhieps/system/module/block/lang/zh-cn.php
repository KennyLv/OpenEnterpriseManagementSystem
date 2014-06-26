<?php
/**
 * The block module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->block->common     = '区块维护';
$lang->block->id         = '编号';
$lang->block->title      = '名称';
$lang->block->limit      = '数量';
$lang->block->type       = '类型';
$lang->block->code       = '代码';
$lang->block->content    = '内容';
$lang->block->moreLink   = '更多链接';
$lang->block->page       = '页面';
$lang->block->regionList = '区域列表';
$lang->block->select     = '请选择区块';
$lang->block->categories = '分类';
$lang->block->showImage  = '显示图片';
$lang->block->showTime   = '显示时间';
$lang->block->product    = '产品';
$lang->block->titleless  = '隐藏标题';
$lang->block->borderless = '隐藏边框';
$lang->block->icon       = '图标';
$lang->block->grid       = '宽度';

$lang->block->add          = "添加";
$lang->block->create       = '添加区块';
$lang->block->browseBlocks = '区块列表';
$lang->block->browseRegion = '布局设置';
$lang->block->edit         = '编辑区块';
$lang->block->view         = '查看区块';
$lang->block->setPage      = '配置页面';

$lang->block->placeholder = new stdclass();
$lang->block->placeholder->moreText = '区块右上角文字';
$lang->block->placeholder->moreUrl  = '区块右上角链接地址';

$lang->block->gridOptions[0]  = '自动';
$lang->block->gridOptions[6]  = '1/2';
$lang->block->gridOptions[4]  = '1/3';
$lang->block->gridOptions[8]  = '2/3';
$lang->block->gridOptions[3]  = '1/4';
$lang->block->gridOptions[9]  = '3/4';
$lang->block->gridOptions[12] = '100%';

$lang->block->typeList['html'] = '自定义区块';
$lang->block->typeList['code'] = '源代码';

$lang->block->typeList['latestArticle']   = '最新文章';
$lang->block->typeList['hotArticle']      = '热门文章';

$lang->block->typeList['latestProduct']   = '最新产品';
$lang->block->typeList['featuredProduct'] = '首页推荐产品';
$lang->block->typeList['hotProduct']      = '热门产品';

$lang->block->typeList['articleTree']     = '文章分类';
$lang->block->typeList['productTree']     = '产品分类';
$lang->block->typeList['blogTree']        = '博客分类';

$lang->block->typeList['contact']         = '联系我们';
$lang->block->typeList['about']           = '公司简介';
$lang->block->typeList['links']           = '友情链接';
$lang->block->typeList['slide']           = '幻灯片';
$lang->block->typeList['header']          = '网站头部';

$lang->block->typeGroups = array();
$lang->block->typeGroups['html'] = 'input';
$lang->block->typeGroups['code'] = 'input';

$lang->block->typeGroups['latestArticle'] = 'article';
$lang->block->typeGroups['hotArticle']    = 'article';

$lang->block->typeGroups['latestProduct']   = 'product';
$lang->block->typeGroups['featuredProduct'] = 'product';
$lang->block->typeGroups['hotProduct']      = 'product';

$lang->block->typeGroups['articleTree'] = 'category';
$lang->block->typeGroups['productTree'] = 'category';
$lang->block->typeGroups['blogTree']    = 'category';

$lang->block->typeGroups['contact'] = 'system';
$lang->block->typeGroups['about']   = 'system';
$lang->block->typeGroups['links']   = 'system';
$lang->block->typeGroups['slide']   = 'system';
$lang->block->typeGroups['header']  = 'system';

$lang->block->category = new stdclass();
$lang->block->category->showChildren = '显示子分类';

$lang->block->category->showChildrenList[1] = '是';
$lang->block->category->showChildrenList[0] = '否';

$lang->block->pages['all']            = '全部页面';
$lang->block->pages['index_index']    = '首页';

$lang->block->pages['article_browse'] = '文章列表页面';
$lang->block->pages['article_view']   = '文章详情页面';

$lang->block->pages['product_browse'] = '产品列表页面';
$lang->block->pages['product_view']   = '产品详情页面';

$lang->block->pages['blog_index']     = '博客列表页面';
$lang->block->pages['blog_view']      = '博客详情页面';

$lang->block->pages['forum_index']    = '论坛首页';
$lang->block->pages['forum_board']    = '帖子列表页面';
$lang->block->pages['thread_view']    = '帖子查看页面';
$lang->block->pages['search_list']    = '搜索结果页';

$lang->block->pages['book_index']     = '手册中心';
$lang->block->pages['book_browse']    = '手册首页';
$lang->block->pages['book_read']      = '手册章节';

$lang->block->pages['message_index']  = '留言';

$lang->block->pages['page_view']      = '单页';

/* page layout list. */
$lang->block->regions = new stdclass();
$lang->block->regions->all['header'] = 'Header(不可见)';
$lang->block->regions->all['top']    = '页头';
$lang->block->regions->all['bottom'] = '页尾';
$lang->block->regions->all['footer'] = 'Footer(不可见)';

$lang->block->regions->index_index['top']     = '上部';
$lang->block->regions->index_index['middle']  = '中部';
$lang->block->regions->index_index['bottom']  = '底部';

$lang->block->regions->article_browse['side'] = '侧边';
$lang->block->regions->article_view['side']   = '侧边';

$lang->block->regions->product_browse['side'] = '侧边';
$lang->block->regions->product_view['side']   = '侧边';

$lang->block->regions->blog_index['side']     = '侧边';
$lang->block->regions->blog_view['side']      = '侧边';

$lang->block->regions->forum_index['top']     = '上部';
$lang->block->regions->forum_index['bottom']  = '底部';
$lang->block->regions->forum_board['top']     = '上部';
$lang->block->regions->forum_board['bottom']  = '底部';
$lang->block->regions->thread_view['top']     = '上部';
$lang->block->regions->thread_view['bottom']  = '底部';

$lang->block->regions->book_browse['side']    = '侧边';
$lang->block->regions->book_read['top']       = '上部';
$lang->block->regions->book_read['bottom']    = '底部';

$lang->block->regions->message_index['side']  = '侧边';

$lang->block->regions->page_view['side']      = '侧边';
