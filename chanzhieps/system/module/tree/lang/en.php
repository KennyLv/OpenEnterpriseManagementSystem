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
$lang->tree->add         = "Add";
$lang->tree->edit        = "Edit";
$lang->tree->addChild    = "Add child";
$lang->tree->delete      = "Delete";
$lang->tree->browse      = "Manage";
$lang->tree->manage      = "Manage";
$lang->tree->fix         = "Fix data";

$lang->tree->common           = 'Category';
$lang->tree->noCategories     = 'No category yet, add one first.';
$lang->tree->timeCountDown    = "Locate to category manage page in <strong id='countDown'>3</strong> seconds.";
$lang->tree->redirect         = 'Manage now';
$lang->tree->aliasRepeat      = 'Alias: %s already exists.';
$lang->tree->aliasConflict    = 'Alias: %s  conflicts with system modules';
$lang->tree->aliasNumber      = 'Alias must not be digital.';
$lang->tree->hasChildren      = "The board has children, can't be deleted.";
$lang->tree->confirmDelete    = "Are you sure to delete it?";
$lang->tree->successFixed     = "Successfully fixed.";
$lang->tree->browseByCategory = 'Browse By Category';

/* Lang items for article, products. */
$lang->category = new stdclass();
$lang->category->common   = 'Category';
$lang->category->name     = 'Name';
$lang->category->alias    = 'Alias';
$lang->category->parent   = 'Parent';
$lang->category->desc     = 'Description';
$lang->category->keywords = 'Keyword';
$lang->category->children = "Children";

/* Lang items for forum. */
$lang->board = new stdclass();
$lang->board->common     = 'Board';
$lang->board->name       = 'Board';
$lang->board->alias      = 'Alias';
$lang->board->parent     = 'Parent';
$lang->board->desc       = 'Description';
$lang->board->keywords   = 'Keyword';
$lang->board->children   = "Children";
$lang->board->readonly   = 'Readonly';
$lang->board->moderators = 'Moderators';

$lang->board->readonlyList[0] = 'Pulic';
$lang->board->readonlyList[1] = 'Readonly';

$lang->board->placeholder = new stdclass();
$lang->board->placeholder->moderators  = "Moderators'account, Separated with" . '","';
$lang->board->placeholder->setChildren = 'Forum needs tow levels boards.';

/* Lang items for wechat menu. */
$lang->wechatMenu = new stdclass();
$lang->wechatMenu->common     = 'Menu for public account';
$lang->wechatMenu->name       = 'Title';
$lang->wechatMenu->parent     = 'Parent';
$lang->wechatMenu->children   = "Children";
$lang->wechatMenu->delete     = "Delete";
$lang->wechatMenu->commit     = "Sync";

$lang->wechatMenu->setResponse = 'Response';
