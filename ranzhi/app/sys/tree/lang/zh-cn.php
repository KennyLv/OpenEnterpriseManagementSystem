<?php
/**
 * The tree module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: zh-cn.php 9878 2014-06-11 09:06:44Z daitingting $
 * @link        http://www.ranzhi.org
 */
$lang->tree->common      = "类目";
$lang->tree->add         = "添加";
$lang->tree->edit        = "编辑";
$lang->tree->children    = "添加子类目";
$lang->tree->delete      = "删除类目";
$lang->tree->browse      = "类目维护";
$lang->tree->manage      = "维护类目";
$lang->tree->fix         = "修复数据";

$lang->tree->noCategories  = '您还没有添加类目，请添加类目。';
$lang->tree->aliasRepeat   = '别名: %s 已经存在,不能重复添加。';
$lang->tree->aliasConflict = '别名: %s 与系统模块冲突，不能添加。';
$lang->tree->hasChildren   = '该板块存在子版块，不能删除。';
$lang->tree->confirmDelete = "您确定删除该类目吗？";
$lang->tree->successFixed  = "成功修复";

/* Lang items for article, products. */
$lang->category = new stdclass();
$lang->category->common   = '类目';
$lang->category->name     = '类目名称';
$lang->category->alias    = '别名';
$lang->category->parent   = '上级类目';
$lang->category->desc     = '描述';
$lang->category->keywords = '关键词';
$lang->category->children = "子类目";

/* Lang items for area. */
$lang->area = new stdclass();
$lang->area->common   = '区域';
$lang->area->name     = '名称';
$lang->area->alias    = '别名';
$lang->area->parent   = '上级区域';
$lang->area->desc     = '描述';
$lang->area->keywords = '关键词';
$lang->area->children = "子区域";

/* Lang items for industry. */
$lang->industry = new stdclass();
$lang->industry->common   = '行业';
$lang->industry->name     = '名称';
$lang->industry->alias    = '别名';
$lang->industry->parent   = '上级行业';
$lang->industry->desc     = '描述';
$lang->industry->keywords = '关键词';
$lang->industry->children = "子行业";

/* Lang items for income. */
$lang->in = new stdclass();
$lang->in->common   = '收入科目';
$lang->in->name     = '名称';
$lang->in->alias    = '别名';
$lang->in->parent   = '上级科目';
$lang->in->desc     = '描述';
$lang->in->keywords = '关键词';
$lang->in->children = '子科目';

/* Lang items for expend. */
$lang->out = new stdclass();
$lang->out->common   = '支出科目';
$lang->out->name     = '名称';
$lang->out->alias    = '别名';
$lang->out->parent   = '上级科目';
$lang->out->desc     = '描述';
$lang->out->keywords = '关键词';
$lang->out->children = '子科目';

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
