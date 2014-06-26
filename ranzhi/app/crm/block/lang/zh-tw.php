<?php
/**
 * The zh-tw file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->admin    = '管理區塊';
$lang->block->num      = '數量';
$lang->block->orderBy  = '排序';
$lang->block->status   = '狀態';
$lang->block->actions  = '操作';
$lang->block->lblBlock = '區塊';

$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->order    = '我的訂單';
//$lang->block->availableBlocks->task     = '我的任務';
$lang->block->availableBlocks->contract = '我的合同';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']        = 'ID 遞增 ';
$lang->block->orderByList->order['id_desc']       = 'ID 遞減';
$lang->block->orderByList->order['customer_asc']  = '客戶';
$lang->block->orderByList->order['product_asc']   = '產品';

$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID 遞增';
$lang->block->orderByList->task['id_desc']       = 'ID 遞減';
$lang->block->orderByList->task['pri_asc']       = '優先順序遞增';
$lang->block->orderByList->task['pri_desc']      = '優先順序遞減';
$lang->block->orderByList->task['deadline_asc']  = '截止日期遞增';
$lang->block->orderByList->task['deadline_desc'] = '截止日期遞減';

$lang->block->orderByList->contract = array();
$lang->block->orderByList->contract['id_asc']       = 'ID 遞增';
$lang->block->orderByList->contract['id_desc']      = 'ID 遞減';
$lang->block->orderByList->contract['customer_asc'] = '客戶';
$lang->block->orderByList->contract['amount_asc']   = '金額遞增';
$lang->block->orderByList->contract['amount_desc']  = '金額遞減';
