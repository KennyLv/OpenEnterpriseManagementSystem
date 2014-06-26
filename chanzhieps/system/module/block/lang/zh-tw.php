<?php
/**
 * The block module zh-tw file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青島息壤網絡信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->block->common     = '區塊維護';
$lang->block->id         = '編號';
$lang->block->title      = '名稱';
$lang->block->limit      = '數量';
$lang->block->type       = '類型';
$lang->block->code       = '代碼';
$lang->block->content    = '內容';
$lang->block->page       = '頁面';
$lang->block->regionList = '區域列表';
$lang->block->select     = '請選擇區塊';
$lang->block->categories = '分類';
$lang->block->showImage  = '顯示圖片';
$lang->block->showTime   = '顯示時間';
$lang->block->product    = '產品';
$lang->block->titleless  = '隱藏標題';
$lang->block->borderless = '隱藏邊框';
$lang->block->icon       = '表徵圖';
$lang->block->grid       = '寬度';

$lang->block->add          = "添加";
$lang->block->create       = '添加區塊';
$lang->block->browseBlocks = '區塊列表';
$lang->block->browseRegion = '佈局設置';
$lang->block->edit         = '編輯區塊';
$lang->block->view         = '查看區塊';
$lang->block->setPage      = '配置頁面';

$lang->block->gridOptions[0]  = '自動';
$lang->block->gridOptions[6]  = '1/2';
$lang->block->gridOptions[4]  = '1/3';
$lang->block->gridOptions[8]  = '2/3';
$lang->block->gridOptions[3]  = '1/4';
$lang->block->gridOptions[9]  = '3/4';
$lang->block->gridOptions[12] = '100%';

$lang->block->typeList['html'] = '自定義區塊';
$lang->block->typeList['code'] = '原始碼';

$lang->block->typeList['latestArticle']   = '最新文章';
$lang->block->typeList['hotArticle']      = '熱門文章';

$lang->block->typeList['latestProduct']   = '最新產品';
$lang->block->typeList['featuredProduct'] = '首頁推薦產品';
$lang->block->typeList['hotProduct']      = '熱門產品';

$lang->block->typeList['articleTree']     = '文章分類';
$lang->block->typeList['productTree']     = '產品分類';
$lang->block->typeList['blogTree']        = '博客分類';

$lang->block->typeList['contact']         = '聯繫我們';
$lang->block->typeList['about']           = '公司簡介';
$lang->block->typeList['links']           = '友情連結';
$lang->block->typeList['slide']           = '幻燈片';
$lang->block->typeList['header']          = '網站頭部';

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
$lang->block->category->showChildren = '顯示子分類';

$lang->block->category->showChildrenList[1] = '是';
$lang->block->category->showChildrenList[0] = '否';

$lang->block->pages['all']            = '全部頁面';
$lang->block->pages['index_index']    = '首頁';

$lang->block->pages['article_browse'] = '文章列表頁面';
$lang->block->pages['article_view']   = '文章詳情頁面';

$lang->block->pages['product_browse'] = '產品列表頁面';
$lang->block->pages['product_view']   = '產品詳情頁面';

$lang->block->pages['blog_index']     = '博客列表頁面';
$lang->block->pages['blog_view']      = '博客詳情頁面';

$lang->block->pages['forum_index']    = '論壇首頁';
$lang->block->pages['forum_board']    = '帖子列表頁面';
$lang->block->pages['thread_view']    = '帖子查看頁面';
$lang->block->pages['search_list']    = '搜索結果頁';

$lang->block->pages['book_index']     = '手冊中心';
$lang->block->pages['book_browse']    = '手冊首頁';
$lang->block->pages['book_read']      = '手冊章節';

$lang->block->pages['message_index']  = '留言';

$lang->block->pages['page_view']      = '單頁';

/* page layout list. */
$lang->block->regions = new stdclass();
$lang->block->regions->all['start']  = '開始部分';
$lang->block->regions->all['header'] = '頭部';
$lang->block->regions->all['footer'] = '底部';
$lang->block->regions->all['end']    = '結束部分';

$lang->block->regions->index_index['header']  = '上部';
$lang->block->regions->index_index['middle']  = '中部';
$lang->block->regions->index_index['footer']  = '底部';

$lang->block->regions->article_browse['side'] = '側邊';
$lang->block->regions->article_view['side']   = '側邊';

$lang->block->regions->product_browse['side'] = '側邊';
$lang->block->regions->product_view['side']   = '側邊';

$lang->block->regions->blog_index['side']     = '側邊';
$lang->block->regions->blog_view['side']      = '側邊';

$lang->block->regions->forum_index['header']  = '上部';
$lang->block->regions->forum_board['header']  = '上部';
$lang->block->regions->thread_view['header']  = '上部';
$lang->block->regions->forum_index['footer']  = '下部';
$lang->block->regions->forum_board['footer']  = '下部';
$lang->block->regions->thread_view['footer']  = '下部';

$lang->block->regions->book_browse['side']    = '側邊';
$lang->block->regions->book_read['header']    = '上部';
$lang->block->regions->book_read['footer']    = '下部';

$lang->block->regions->message_index['side']  = '側邊';

$lang->block->regions->page_view['side']      = '側邊';
