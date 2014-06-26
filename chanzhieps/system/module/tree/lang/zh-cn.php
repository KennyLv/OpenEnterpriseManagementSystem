<?php
/**
 * The tree category zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->tree->add         = "添加";
$lang->tree->edit        = "编辑";
$lang->tree->addChild    = "添加子类目";
$lang->tree->delete      = "删除类目";
$lang->tree->browse      = "类目维护";
$lang->tree->manage      = "维护类目";
$lang->tree->fix         = "修复数据";

$lang->tree->common           = '类目';
$lang->tree->noCategories     = '您还没有添加类目，请添加类目。';
$lang->tree->timeCountDown    = "<strong id='countDown'>3</strong> 秒后转向类目管理页面。";
$lang->tree->redirect         = '立即转向';
$lang->tree->aliasRepeat      = '别名: %s 已经存在,不能重复添加。';
$lang->tree->aliasConflict    = '别名: %s 与系统模块冲突，不能添加。';
$lang->tree->aliasNumber      = '别名不能为数字。';
$lang->tree->hasChildren      = '该板块存在子版块，不能删除。';
$lang->tree->confirmDelete    = "您确定删除该类目吗？";
$lang->tree->successFixed     = "成功修复";
$lang->tree->browseByCategory = '类目浏览';

/* Lang items for article, products. */
$lang->category = new stdclass();
$lang->category->common   = '类目';
$lang->category->name     = '类目名称';
$lang->category->alias    = '别名';
$lang->category->parent   = '上级类目';
$lang->category->desc     = '描述';
$lang->category->keywords = '关键词';
$lang->category->children = "子类目";

/* Lang items for forum. */
$lang->board = new stdclass();
$lang->board->common     = '版块';
$lang->board->name       = '版块';
$lang->board->alias      = '别名';
$lang->board->parent     = '上级版块';
$lang->board->desc       = '描述';
$lang->board->keywords   = '关键词';
$lang->board->children   = "子版块";
$lang->board->readonly   = '访问权限';
$lang->board->moderators = '版主';

$lang->board->readonlyList[0] = '开放';
$lang->board->readonlyList[1] = '只读';

$lang->board->placeholder = new stdclass();
$lang->board->placeholder->moderators  = '会员用户名, 多个用户名之间用逗号隔开';
$lang->board->placeholder->setChildren = '论坛功能需要设置二级版块才能使用。';

/* Lang items for wechat menu. */
$lang->wechatMenu = new stdclass();
$lang->wechatMenu->common     = '公众号菜单';
$lang->wechatMenu->name       = '标题';
$lang->wechatMenu->parent     = '上级菜单';
$lang->wechatMenu->children   = "子菜单";
$lang->wechatMenu->delete     = "清空微信菜单";
$lang->wechatMenu->commit     = "同步到微信";

$lang->wechatMenu->setResponse = '响应设置';
