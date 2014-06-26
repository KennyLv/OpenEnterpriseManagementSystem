<?php
/**
 * The zh-cn file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->app = new stdclass();
$lang->app->name = 'CASH';

$lang->menu->cash = new stdclass();
$lang->menu->cash->dashboard = '我的地盘|dashboard|index|';
$lang->menu->cash->trade     = '记账|trade|index|';
$lang->menu->cash->check     = '对账|depositor|check|';
$lang->menu->cash->depositor = '账户|depositor|index|';
$lang->menu->cash->setting   = '设置|tree|browse|type=in|';

/* Menu of depositor module. */
$lang->depositor = new stdclass();
$lang->depositor->menu = new stdclass();
$lang->depositor->menu->browse  = array('link' => '<i class="icon-th-list"></i> 帐号列表|depositor|browse|', 'alias' => 'create,edit,view');
$lang->depositor->menu->balance = '<i class="icon-th-list"></i> 账号余额|balance|browse|';

/* Menu of trade module. */
$lang->trade = new stdclass();
$lang->trade->menu = new stdclass();
$lang->trade->menu->browse   = array('link' => '<i class="icon-th-list"></i> 列表|trade|browse|', 'alias' => 'create,edit,view');

/* Menu of setting module. */
$lang->setting = new stdclass();
$lang->setting->menu = new stdclass();
$lang->setting->menu->income   = '收入科目|tree|browse|type=in|';
$lang->setting->menu->expend   = '支出科目|tree|browse|type=out|';
$lang->setting->menu->currency = '货币类型|setting|lang|module=depositor&field=currencyList';
