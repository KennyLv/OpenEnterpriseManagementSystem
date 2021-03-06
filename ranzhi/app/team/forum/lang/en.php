<?php
/**
 * The forum module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     forum
 * @version     $Id: en.php 9893 2014-06-12 08:14:40Z daitingting $
 * @link        http://www.ranzhi.org
 */
$lang->forum->common      = 'Forum';
$lang->forum->index       = 'Index';
$lang->forum->board       = 'Board';
$lang->forum->owners      = 'Moderator';
$lang->forum->threadList  = 'Threads';
$lang->forum->threadCount = 'Threads';
$lang->forum->postCount   = 'Posts';
$lang->forum->noPost      = 'No thread';
$lang->forum->lastPost    = 'Last posted: %s by %s';
$lang->forum->readonly    = 'Readonly';
$lang->forum->notExist    = 'The board does not exist.';
$lang->forum->lblOwner    = " [ Moderator: %s ]";

$lang->forum->post   = 'Post';
$lang->forum->admin  = 'Admin';
$lang->forum->update = 'Update';

$lang->forum->updateDesc    = 'This action will re-compute the stats(threads, replies) of every board again.';
$lang->forum->successUpdate = 'Update sucessfully';

/* Adjust the pager. */
$lang->pager->noRecord      = '';
$lang->pager->digest        = str_replace('records', 'threads', $lang->pager->digest);
$lang->pager->settedInForum = true;    // Set this switch thus in thread module can avoid overiding them.
