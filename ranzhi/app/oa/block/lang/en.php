<?php
/**
 * The en file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->block->announce = 'Announce';
$lang->block->lblBlock = 'Block';
$lang->block->admin    = 'Manage blocks';

$lang->block->availableBlocks = new stdclass();
$lang->block->availableBlocks->announce       = 'Announce';
$lang->block->availableBlocks->myCreatedTask  = 'The task of created by me';
$lang->block->availableBlocks->assignedMeTask = 'The task of assigned to me';

$lang->block->num     = 'Number';
$lang->block->orderBy = 'Order';
$lang->block->status  = 'Status';
$lang->block->asc     = 'ASC';
$lang->block->desc    = 'DESC';
$lang->block->actions = 'Options';

$lang->block->orderByList = new stdclass();;
$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID ASC';
$lang->block->orderByList->task['id_desc']       = 'ID DESC';
$lang->block->orderByList->task['pri_asc']       = 'Priority ASC';
$lang->block->orderByList->task['pri_desc']      = 'Priority DESC';
$lang->block->orderByList->task['deadline_asc']  = 'Deadline ASC';
$lang->block->orderByList->task['deadline_desc'] = 'Deadline DESC';
