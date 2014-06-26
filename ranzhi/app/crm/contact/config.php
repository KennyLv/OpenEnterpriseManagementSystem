<?php
/**
 * The config file of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->contact->require = new stdclass();
$config->contact->require->create = 'customer, realname';
$config->contact->require->edit   = 'customer, realname';

$config->contact->contactWayList  = array( 'email', 'skype', 'qq', 'yahoo', 'gtalk', 'wangwang', 'site', 'mobile', 'phone', 'weibo', 'weixin');
