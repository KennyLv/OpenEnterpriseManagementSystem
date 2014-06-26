<?php
/**
 * The forum module zh-tw file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青島息壤網絡信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     forum
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->forum->board       = '版塊';
$lang->forum->owners      = '版主';
$lang->forum->threadList  = '主題列表';
$lang->forum->threadCount = '主題數';
$lang->forum->postCount   = '帖子數';
$lang->forum->lastPost    = '最後發表';
$lang->forum->readonly    = '只讀版塊。';
$lang->forum->notExist    = '版塊不存在。';
$lang->forum->lblOwner    = " [ 版主：%s ]";

$lang->forum->post   = '發貼';
$lang->forum->admin  = '論壇維護';
$lang->forum->update = '更新數據';

$lang->forum->updateDesc    = '該更新操作會重新計算每個版塊的發貼數據。';
$lang->forum->successUpdate = '更新數據成功';

/* Adjust the pager. */
$lang->pager->noRecord      = '';
$lang->pager->digest        = str_replace('記錄', '主題', $lang->pager->digest);
$lang->pager->settedInForum = true;    // Set this switch thus in thread module can avoid overiding them.
