<?php
/**
 * The en file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->app = new stdclass();
$lang->app->name = 'CASH';

$lang->menu->cash = new stdclass();
$lang->menu->cash->dashboard = 'Dashboard|dashboard|index|';
$lang->menu->cash->trade     = 'Bills|trade|index|';
$lang->menu->cash->check     = 'Checking|depositor|check|';
$lang->menu->cash->depositor = 'Depositor|depositor|index|';
$lang->menu->cash->setting   = 'Settings|tree|browse|type=in|';

/* Menu of depositor module. */
$lang->depositor = new stdclass();
$lang->depositor->menu = new stdclass();
$lang->depositor->menu->browse = array('link' => '<i class="icon-th-list"></i> Depositor List|depositor|browse|', 'alias' => 'create,edit,view');
$lang->depositor->menu->balance = '<i class="icon-th-list"></i> Balance|balance|browse|';

/* Menu of trade module. */
$lang->trade = new stdclass();
$lang->trade->menu = new stdclass();
$lang->trade->menu->browse   = array('link' => '<i class="icon-th-list"></i> Bills|trade|browse|', 'alias' => 'create,edit,view');

/* Menu of setting module. */
$lang->setting = new stdclass();
$lang->setting->menu = new stdclass();
$lang->setting->menu->income   = 'Income|tree|browse|type=in|';
$lang->setting->menu->expend   = 'Expend|tree|browse|type=out|';
$lang->setting->menu->currency = 'Currency|setting|lang|module=depositor&field=currencyList';
