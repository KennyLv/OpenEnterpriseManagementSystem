<?php
/**
 * The zh-cn file of entry module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: zh-cn.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
$lang->entry->common    = '应用';
$lang->entry->admin     = '应用列表';
$lang->entry->create    = '添加应用';
$lang->entry->edit      = '编辑应用';
$lang->entry->delete    = '删除应用';
$lang->entry->code      = '代号';
$lang->entry->name      = '名称';
$lang->entry->key       = '密钥';
$lang->entry->block     = '区块地址';
$lang->entry->ip        = 'IP列表';
$lang->entry->logo      = 'Logo';
$lang->entry->createKey = '重新生成密钥';
$lang->entry->login     = '登录地址';
$lang->entry->logout    = '退出地址';
$lang->entry->nothing   = '暂时没有应用';
$lang->entry->open      = '打开方式';
$lang->entry->control   = '窗口控制条';
$lang->entry->size      = '窗口大小';
$lang->entry->position  = '显示位置';
$lang->entry->width     = '宽';
$lang->entry->height    = '高';

$lang->entry->confirmDelete = '您确定删除该应用吗？';
$lang->entry->lblBlock      = '区块';

$lang->entry->note = new stdClass();
$lang->entry->note->name    = '授权应用名称';
$lang->entry->note->code    = '授权应用代号';
$lang->entry->note->login   = '登录应用的表单提交地址';
$lang->entry->note->logout  = '退出应用的地址';
$lang->entry->note->visible = '显示在首页左侧栏';
$lang->entry->note->api     = '应用获取区块的接口地址';
$lang->entry->note->ip      = "允许该应用使用这些ip访问，多个ip使用逗号隔开。支持IP段，如192.168.1.*";

$lang->entry->error = new stdClass();
$lang->entry->error->name  = '名称不能为空';
$lang->entry->error->code  = '代号不能为空';
$lang->entry->error->key   = '密钥不能为空';
$lang->entry->error->ip    = 'IP列表不能为空';

$lang->entry->openList['']       = '';
$lang->entry->openList['blank']  = '新开标签';
$lang->entry->openList['iframe'] = '内嵌窗口';

$lang->entry->sizeList['max']    = '最大化';
$lang->entry->sizeList['custom'] = '自定义';

$lang->entry->positionList['default'] = '默认';
$lang->entry->positionList['center']  = '居中';

$lang->entry->controlList['none']   = '无';
$lang->entry->controlList['full']   = '完整';
$lang->entry->controlList['simple'] = '透明';
