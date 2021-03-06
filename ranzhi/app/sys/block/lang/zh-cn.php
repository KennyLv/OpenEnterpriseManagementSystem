<?php
/**
 * The zh-cn file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->common = '区块';
$lang->block->name   = '区块名称';

$lang->block->lblEntry = '应用';
$lang->block->lblBlock = '区块';
$lang->block->lblRss   = 'RSS地址';
$lang->block->lblNum   = '条数';
$lang->block->lblHtml  = 'HTML内容';

$lang->block->params = new stdclass();
$lang->block->params->name  = '参数名称';
$lang->block->params->value = '参数值';

$lang->block->createBlock = '添加区块';
$lang->block->ordersSaved = '排序已保存';

$lang->block->default['oa']['b1']['name']    = '系统公告';
$lang->block->default['oa']['b1']['blockID'] = 'announce';
$lang->block->default['oa']['b1']['type']    = 'system';

$lang->block->default['oa']['b1']['params']['num'] = 15;

$lang->block->default['oa']['b2']['name']    = '由我创建的任务';
$lang->block->default['oa']['b2']['blockID'] = 'myCreatedTask';
$lang->block->default['oa']['b2']['type']    = 'system';

$lang->block->default['oa']['b2']['params']['num']     = 15;
$lang->block->default['oa']['b2']['params']['orderBy'] = 'id_desc';
$lang->block->default['oa']['b2']['params']['status']  = array();

$lang->block->default['oa']['b3']['name']    = '指派给我的任务';
$lang->block->default['oa']['b3']['blockID'] = 'assignedMeTask';
$lang->block->default['oa']['b3']['type']    = 'system';

$lang->block->default['oa']['b3']['params']['num']     = 15;
$lang->block->default['oa']['b3']['params']['orderBy'] = 'id_desc';
$lang->block->default['oa']['b3']['params']['status']  = array();

$lang->block->default['crm']['b1']['name']    = '我的订单';
$lang->block->default['crm']['b1']['blockID'] = 'order';
$lang->block->default['crm']['b1']['type']    = 'system';

$lang->block->default['crm']['b1']['params']['num']     = 15;
$lang->block->default['crm']['b1']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['b1']['params']['status']  = array();

$lang->block->default['crm']['b2']['name']    = '我的合同';
$lang->block->default['crm']['b2']['blockID'] = 'contract';
$lang->block->default['crm']['b2']['type']    = 'system';

$lang->block->default['crm']['b2']['params']['num']     = 15;
$lang->block->default['crm']['b2']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['b2']['params']['status']  = array();

$lang->block->default['cash']['b1']['name']    = '付款账户';
$lang->block->default['cash']['b1']['blockID'] = 'depositor';
$lang->block->default['cash']['b1']['type']    = 'system';

$lang->block->default['team']['b1']['name']    = '最新博客';
$lang->block->default['team']['b1']['blockID'] = 'blog';
$lang->block->default['team']['b1']['type']    = 'system';

$lang->block->default['team']['b1']['params']['num']     = 15;

$lang->block->default['team']['b2']['name']    = '最新帖子';
$lang->block->default['team']['b2']['blockID'] = 'thread';
$lang->block->default['team']['b2']['type']    = 'system';

$lang->block->default['team']['b2']['params']['num']     = 15;

$lang->block->default['sys']['b1'] = $lang->block->default['oa']['b1'];
$lang->block->default['sys']['b1']['entryID'] = 'oa';
$lang->block->default['sys']['b2'] = $lang->block->default['crm']['b2'];
$lang->block->default['sys']['b2']['entryID'] = 'crm';
$lang->block->default['sys']['b3'] = $lang->block->default['crm']['b1'];
$lang->block->default['sys']['b3']['entryID'] = 'crm';
$lang->block->default['sys']['b4'] = $lang->block->default['cash']['b1'];
$lang->block->default['sys']['b4']['entryID'] = 'cash';
$lang->block->default['sys']['b5'] = $lang->block->default['team']['b1'];
$lang->block->default['sys']['b5']['entryID'] = 'team';
$lang->block->default['sys']['b6'] = $lang->block->default['team']['b2'];
$lang->block->default['sys']['b6']['entryID'] = 'team';
