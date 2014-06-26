<?php
/**
 * The zh-tw file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->block->announce = '系統公告';
$lang->block->lblBlock = '區塊';
$lang->block->admin    = '管理區塊';

$lang->block->availableBlocks = new stdclass();
$lang->block->availableBlocks->announce       = '系統公告';
$lang->block->availableBlocks->myCreatedTask  = '我創建的任務';
$lang->block->availableBlocks->assignedMeTask = '指派給我的任務';

$lang->block->num     = '數量';
$lang->block->orderBy = '排序';
$lang->block->status  = '狀態';
$lang->block->asc     = '正序';
$lang->block->desc    = '倒序';
$lang->block->actions = '操作';

$lang->block->orderByList = new stdclass();;
$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID 遞增';
$lang->block->orderByList->task['id_desc']       = 'ID 遞減';
$lang->block->orderByList->task['pri_asc']       = '優先順序遞增';
$lang->block->orderByList->task['pri_desc']      = '優先順序遞減';
$lang->block->orderByList->task['deadline_asc']  = '截止日期遞增';
$lang->block->orderByList->task['deadline_desc'] = '截止日期遞減';
