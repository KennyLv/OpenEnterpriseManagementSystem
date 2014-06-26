<?php
/**
 * The config file of trade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->trade->require = new stdclass();

$config->trade->require->create   = 'money,type,handlers';
$config->trade->require->edit     = 'money,type,handlers';

$config->trade->batchCreate = 10;
