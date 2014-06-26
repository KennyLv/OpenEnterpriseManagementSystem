<?php
/**
 * The config file of contract module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->contract->require = new stdclass();
$config->contract->require->create = 'customer, name';
$config->contract->require->edit   = 'customer, name';

$config->contract->editor = new stdclass();
$config->contract->editor->create   = array('id' => 'items', 'tools' => 'full');
$config->contract->editor->edit     = array('id' => 'items', 'tools' => 'full');
$config->contract->editor->receive  = array('id' => 'comment', 'tools' => 'simple');
$config->contract->editor->delivery = array('id' => 'comment', 'tools' => 'simple');
$config->contract->editor->finish   = array('id' => 'comment', 'tools' => 'simple');
$config->contract->editor->cancel   = array('id' => 'comment', 'tools' => 'simple');

$config->contract->codeFormat = array('Y', 'm', 'd', 'input');
