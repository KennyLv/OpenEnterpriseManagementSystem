<?php
/**
 * The thread module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     thread
 * @version     $Id: zh-cn.php 9874 2014-06-11 08:59:47Z daitingting $
 * @link        http://www.ranzhi.org
 */
$lang->thread->common    = '主题';

$lang->thread->id         = '编号';
$lang->thread->title      = '标题';
$lang->thread->board      = '版块';
$lang->thread->author     = '作者';
$lang->thread->content    = '内容';
$lang->thread->file       = '附件: ';
$lang->thread->postedDate = '发表于';
$lang->thread->replies    = '回帖';
$lang->thread->views      = '阅读';
$lang->thread->lastReply  = '最后回帖';

$lang->thread->post         = '发贴';
$lang->thread->postTo       = '发布贴子到';
$lang->thread->browse       = '主题列表';
$lang->thread->stick        = '置顶';
$lang->thread->edit         = '编辑主题';
$lang->thread->view         = '查看主题';
$lang->thread->delete       = '删除主题';
$lang->thread->status       = '状态';
$lang->thread->hide         = '隐藏';
$lang->thread->show         = '显示';
$lang->thread->transfer     = '转移';
$lang->thread->switchStatus = '切换状态';
$lang->thread->deleteFile   = '删除附件';

$lang->thread->sticks[0] = '不置顶';
$lang->thread->sticks[1] = '版块置顶';
$lang->thread->sticks[2] = '全局置顶';

$lang->thread->statusList['hidden'] = '已隐藏';
$lang->thread->statusList['normal'] = '正常';

$lang->thread->confirmDeleteThread = "您确定删除该主题吗？";
$lang->thread->confirmHideReply    = "您确定隐藏回帖吗？";
$lang->thread->confirmHideThread   = "您确定隐藏该主题吗？";
$lang->thread->confirmDeleteReply  = "您确定删除该回帖吗？";
$lang->thread->confirmDeleteFile   = "您确定删除该附件吗？";

$lang->thread->lblEdited       = '%s 最后编辑, %s';
$lang->thread->message         = '%s在论坛#%s回复了主题：%s，内容为：%s';
$lang->thread->readonly        = '只读';
$lang->thread->successStick    = '成功置顶';
$lang->thread->successUnstick  = '成功取消置顶';
$lang->thread->readonlyMessage = '该帖已被设置为 <strong>只读</strong>，您暂时无法发表新的回复。';
$lang->thread->successTransfer = '转移成功';

/* Adjust the pager. */
if(!isset($lang->pager->settedInForum))
{
    $lang->pager->noRecord = '';
    $lang->pager->digest   = str_replace('记录', '回贴', $lang->pager->digest);
}
