<?php
/**
 * The config file of action module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     action 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->action->require = new stdclass();
$config->action->require->createRecord = 'contact,comment';

$config->action->objectNameFields['product']  = 'name';
$config->action->objectNameFields['task']     = 'name';
$config->action->objectNameFields['user']     = 'account';
$config->action->objectNameFields['customer'] = 'name';
$config->action->objectNameFields['contract'] = 'name';
$config->action->objectNameFields['article']  = 'title';
