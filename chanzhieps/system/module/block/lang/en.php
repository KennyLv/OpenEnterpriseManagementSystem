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
$lang->block->common     = 'Block';
$lang->block->id         = 'ID';
$lang->block->title      = 'Title';
$lang->block->limit      = 'Limit';
$lang->block->type       = 'Type';
$lang->block->code       = 'Codes';
$lang->block->content    = 'Content';
$lang->block->page       = 'Page';
$lang->block->regionList = 'Regions List';
$lang->block->select     = 'Please select a block';
$lang->block->categories = 'Categories';
$lang->block->showImage  = 'Show image';
$lang->block->showTime   = 'Show time';
$lang->block->product    = 'Product';
$lang->block->titleless  = 'Hide Title';
$lang->block->borderless = 'Hide Border';
$lang->block->icon       = 'Icon';
$lang->block->grid       = 'Width';

$lang->block->add          = "Add";
$lang->block->create       = 'Create Block';
$lang->block->browseBlocks = 'Browse Blocks';
$lang->block->browseRegion = 'Browse Regions';
$lang->block->edit         = 'Edit';
$lang->block->view         = 'view';
$lang->block->setPage      = 'Set page blocks';

$lang->block->gridOptions[0]  = 'Auto';
$lang->block->gridOptions[6]  = '1/2';
$lang->block->gridOptions[4]  = '1/3';
$lang->block->gridOptions[8]  = '2/3';
$lang->block->gridOptions[3]  = '1/4';
$lang->block->gridOptions[9]  = '3/4';
$lang->block->gridOptions[12] = '100%';

$lang->block->typeList['html'] = 'Html block';
$lang->block->typeList['code'] = 'Codes';

$lang->block->typeList['latestArticle'] = 'Latest Articles';
$lang->block->typeList['hotArticle']    = 'Hot Articles';

$lang->block->typeList['latestProduct']   = 'Latest Products';
$lang->block->typeList['featuredProduct'] = 'Featured Products';
$lang->block->typeList['hotProduct']      = 'Hot Products';

$lang->block->typeList['articleTree'] = 'Article Categories';
$lang->block->typeList['productTree'] = 'Product Categories';
$lang->block->typeList['blogTree']    = 'Blog Categories';

$lang->block->typeList['contact'] = 'Contact Us';
$lang->block->typeList['about']   = 'About Us';
$lang->block->typeList['links']   = 'Links';
$lang->block->typeList['slide']   = 'Slide';
$lang->block->typeList['header']  = 'Header';

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
$lang->block->category->showChildren = 'Show Children';

$lang->block->category->showChildrenList[1] = 'Yes';
$lang->block->category->showChildrenList[0] = 'No';

$lang->block->pages['all']            = 'All';
$lang->block->pages['index_index']    = 'Home';

$lang->block->pages['article_browse'] = 'Browse article page';
$lang->block->pages['article_view']   = 'View article page';

$lang->block->pages['product_browse'] = 'Browse product page';
$lang->block->pages['product_view']   = 'View product page';

$lang->block->pages['blog_index']     = 'Browse blog page';
$lang->block->pages['blog_view']      = 'View blog page';

$lang->block->pages['forum_index']    = 'Forum home';
$lang->block->pages['forum_board']    = 'Forum board';
$lang->block->pages['thread_view']    = 'View thread';
$lang->block->pages['search_list']    = 'Search';

$lang->block->pages['book_index']     = 'Book';
$lang->block->pages['book_browse']    = 'Book catalogue';
$lang->block->pages['book_read']      = 'Book content';

$lang->block->pages['message_index']  = 'Inquire';

$lang->block->pages['page_view']      = 'Page';

/* page layout list. */
$lang->block->regions = new stdclass();
$lang->block->regions->all['header'] = 'Header(invisible)';
$lang->block->regions->all['top']    = 'Top';
$lang->block->regions->all['bottom'] = 'Bottom';
$lang->block->regions->all['footer'] = 'Footer(invisible)';

$lang->block->regions->index_index['top']     = 'Top';
$lang->block->regions->index_index['middle']  = 'Middle';
$lang->block->regions->index_index['Bottom']  = 'Bottom';

$lang->block->regions->article_browse['side'] = 'Side';
$lang->block->regions->article_view['side']   = 'Side';

$lang->block->regions->product_browse['side'] = 'Side';
$lang->block->regions->product_view['side']   = 'Side';

$lang->block->regions->blog_index['side']     = 'Side';
$lang->block->regions->blog_view['side']      = 'Side';

$lang->block->regions->forum_index['top']     = 'Top';
$lang->block->regions->forum_index['bottom']  = 'Bottom';
$lang->block->regions->forum_board['top']     = 'Top';
$lang->block->regions->forum_board['bottom']  = 'Bottom';
$lang->block->regions->thread_view['top']     = 'Top';
$lang->block->regions->thread_view['bottom']  = 'Bottom';

$lang->block->regions->book_browse['side']    = 'Side';
$lang->block->regions->book_read['top']       = 'Top';
$lang->block->regions->book_read['bottom']    = 'Bottom';

$lang->block->regions->message_index['side']  = 'Side';

$lang->block->regions->page_view['side']      = 'Side';
