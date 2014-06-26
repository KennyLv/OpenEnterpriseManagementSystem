<?php
/**
 * The zh-tw file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->app = new stdclass();
$lang->app->name = 'OA';

$lang->menu->oa = new stdclass();
$lang->menu->oa->dashboard = '我的地盤|dashboard|index|';
$lang->menu->oa->project   = '項目|project|index|';
$lang->menu->oa->announce  = '公告|announce|index|';
$lang->menu->oa->doc       = '文檔|doc|index|';

$lang->dashboard = new stdclass();
$lang->block     = new stdclass();
$lang->project   = new stdclass();

$lang->announce = new stdclass();
$lang->announce->menu = new stdclass();
$lang->announce->menu->browse   = array('link' => '公告列表|announce|browse|', 'alias' => 'view');
$lang->announce->menu->create   = '添加公告|announce|create|';
$lang->announce->menu->category = '類目管理|tree|browse|type=announce|';

$lang->doc = new stdclass();
$lang->doc->menu = new stdclass();
$lang->doc->menu->create = '添加文檔庫|doc|createlib|';
