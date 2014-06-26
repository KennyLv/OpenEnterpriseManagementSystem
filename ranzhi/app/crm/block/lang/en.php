<?php
/**
 * The en file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->admin    = 'Manage Blocks';
$lang->block->num      = 'Amount';
$lang->block->orderBy  = 'Order By';
$lang->block->status   = 'Status';
$lang->block->actions  = 'Options';
$lang->block->lblBlock = 'Block';

$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->order    = 'My Orders';
//$lang->block->availableBlocks->task     = 'My Tasks';
$lang->block->availableBlocks->contract = 'My Contracts';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']        = 'ID ASC ';
$lang->block->orderByList->order['id_desc']       = 'ID DESC';
$lang->block->orderByList->order['customer_asc']  = 'Customer';
$lang->block->orderByList->order['product_asc']   = 'Product';

$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID ASC';
$lang->block->orderByList->task['id_desc']       = 'ID DESC';
$lang->block->orderByList->task['pri_asc']       = 'Priority ASC';
$lang->block->orderByList->task['pri_desc']      = 'Priority DESC';
$lang->block->orderByList->task['deadline_asc']  = 'Deadline ASC';
$lang->block->orderByList->task['deadline_desc'] = 'Deadline DESC';

$lang->block->orderByList->contract = array();
$lang->block->orderByList->contract['id_asc']       = 'ID ASC';
$lang->block->orderByList->contract['id_desc']      = 'ID DESC';
$lang->block->orderByList->contract['customer_asc'] = 'Customer';
$lang->block->orderByList->contract['amount_asc']   = 'Amount ASC';
$lang->block->orderByList->contract['amount_desc']  = 'Amount DESC';
