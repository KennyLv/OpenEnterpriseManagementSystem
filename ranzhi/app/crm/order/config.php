<?php
/**
 * The config file of order module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->order->require = new stdclass();
$config->order->require->create = 'product,customer';
$config->order->require->edit   = 'product,customer';

$config->order->editor = new stdclass();
$config->order->editor->close    = array('id' => 'closedNote', 'tools' => 'simple');
$config->order->editor->assign   = array('id' => 'comment', 'tools' => 'simple');
$config->order->editor->activate = array('id' => 'comment', 'tools' => 'simple');

$config->order->statusClassList['normal']   = '';
$config->order->statusClassList['assigned'] = 'alert-warning';
$config->order->statusClassList['signed']   = 'alert-info';
$config->order->statusClassList['payed']    = 'alert-success';
$config->order->statusClassList['closed']   = '';
