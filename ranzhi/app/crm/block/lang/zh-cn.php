<?php
/**
 * The zh-cn file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->admin    = '管理区块';
$lang->block->num      = '数量';
$lang->block->orderBy  = '排序';
$lang->block->status   = '状态';
$lang->block->actions  = '操作';
$lang->block->lblBlock = '区块';

$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->order    = '我的订单';
//$lang->block->availableBlocks->task     = '我的任务';
$lang->block->availableBlocks->contract = '我的合同';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']        = 'ID 递增 ';
$lang->block->orderByList->order['id_desc']       = 'ID 递减';
$lang->block->orderByList->order['customer_asc']  = '客户';
$lang->block->orderByList->order['product_asc']   = '产品';

$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID 递增';
$lang->block->orderByList->task['id_desc']       = 'ID 递减';
$lang->block->orderByList->task['pri_asc']       = '优先级递增';
$lang->block->orderByList->task['pri_desc']      = '优先级递减';
$lang->block->orderByList->task['deadline_asc']  = '截止日期递增';
$lang->block->orderByList->task['deadline_desc'] = '截止日期递减';

$lang->block->orderByList->contract = array();
$lang->block->orderByList->contract['id_asc']       = 'ID 递增';
$lang->block->orderByList->contract['id_desc']      = 'ID 递减';
$lang->block->orderByList->contract['customer_asc'] = '客户';
$lang->block->orderByList->contract['amount_asc']   = '金额递增';
$lang->block->orderByList->contract['amount_desc']  = '金额递减';
