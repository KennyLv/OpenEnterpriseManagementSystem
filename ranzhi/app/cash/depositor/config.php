<?php
/**
 * The config file of depositor module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->depositor->require = new stdclass();
$config->depositor->require->create = 'type, abbr, currency';
$config->depositor->require->edit   = 'abbr';

$config->depositor->editor = new stdclass();
$config->depositor->editor->forbid   = array('id' => 'comment', 'tools' => 'simple');
$config->depositor->editor->activate = array('id' => 'comment', 'tools' => 'simple');
