<?php
/**
 * The en file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->common = 'Block';
$lang->block->name   = 'Name';

$lang->block->lblEntry = 'Entry';
$lang->block->lblBlock = 'Block';
$lang->block->lblRss   = 'RSS';
$lang->block->lblNum   = 'Number';
$lang->block->lblHtml  = 'HTML';

$lang->block->params = new stdclass();
$lang->block->params->name  = 'Name';
$lang->block->params->value = 'Value';

$lang->block->createBlock = 'Create Block';
$lang->block->ordersSaved = 'Sort have been saved';

$lang->block->default['oa']['b1']['name']    = 'System Announcement';
$lang->block->default['oa']['b1']['blockID'] = 'announce';
$lang->block->default['oa']['b1']['type']    = 'system';

$lang->block->default['oa']['b1']['params']['num'] = 15;

$lang->block->default['oa']['b2']['name']    = 'The task of created by me';
$lang->block->default['oa']['b2']['blockID'] = 'myCreatedTask';
$lang->block->default['oa']['b2']['type']    = 'system';

$lang->block->default['oa']['b2']['params']['num']     = 15;
$lang->block->default['oa']['b2']['params']['orderBy'] = 'id_desc';
$lang->block->default['oa']['b2']['params']['status']  = array();

$lang->block->default['oa']['b3']['name']    = 'The task of assigned to me';
$lang->block->default['oa']['b3']['blockID'] = 'assignedMeTask';
$lang->block->default['oa']['b3']['type']    = 'system';

$lang->block->default['oa']['b3']['params']['num']     = 15;
$lang->block->default['oa']['b3']['params']['orderBy'] = 'id_desc';
$lang->block->default['oa']['b3']['params']['status']  = array();

$lang->block->default['crm']['b1']['name']    = 'My Order';
$lang->block->default['crm']['b1']['blockID'] = 'order';
$lang->block->default['crm']['b1']['type']    = 'system';

$lang->block->default['crm']['b1']['params']['num']     = 15;
$lang->block->default['crm']['b1']['params']['orderBy'] = 'id_asc';
$lang->block->default['crm']['b1']['params']['status']  = array();

$lang->block->default['crm']['b2']['name']    = 'My Contract';
$lang->block->default['crm']['b2']['blockID'] = 'contract';
$lang->block->default['crm']['b2']['type']    = 'system';

$lang->block->default['crm']['b2']['params']['num']     = 15;
$lang->block->default['crm']['b2']['params']['orderBy'] = 'id_asc';
$lang->block->default['crm']['b2']['params']['status']  = array();

$lang->block->default['cash']['b1']['name']    = 'Payment Depositor';
$lang->block->default['cash']['b1']['blockID'] = 'depositor';
$lang->block->default['cash']['b1']['type']    = 'system';

$lang->block->default['team']['b1']['name']    = 'Latest Blog';
$lang->block->default['team']['b1']['blockID'] = 'blog';
$lang->block->default['team']['b1']['type']    = 'system';

$lang->block->default['team']['b1']['params']['num'] = 15;

$lang->block->default['team']['b2']['name']    = 'Latest Thread';
$lang->block->default['team']['b2']['blockID'] = 'thread';
$lang->block->default['team']['b2']['type']    = 'system';

$lang->block->default['team']['b2']['params']['num'] = 15;

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
