<?php
/**
 * The customer module config file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->customer->require = new stdclass();
$config->customer->require->create = 'contact';
$config->customer->require->edit   = 'name';

$config->customer->editor = new stdclass();
$config->customer->editor->create = array('id' => 'desc', 'tools' => 'simple');
$config->customer->editor->edit   = array('id' => 'desc', 'tools' => 'simple');
