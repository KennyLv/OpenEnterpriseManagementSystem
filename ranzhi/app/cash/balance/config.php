<?php
/**
 * The config file of balance module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     balance 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->balance->require = new stdclass();

$config->balance->require->create = 'depositor,currency';
$config->balance->require->edit   = 'depositor,currency';
