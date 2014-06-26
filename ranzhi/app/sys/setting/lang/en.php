<?php
/**
 * The setting module english file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     setting 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->setting->common = 'Setting';
$lang->setting->reset  = 'Reset';
$lang->setting->key    = 'Key';
$lang->setting->value  = 'Value';

$lang->setting->module = new stdClass();
$lang->setting->module->user     = 'User role';
$lang->setting->module->product  = 'Product status';
$lang->setting->module->customer = 'Customer level';

$lang->setting->user = new stdClass();
$lang->setting->user->fields['roleList'] = 'Role list';

$lang->setting->product = new stdClass();
$lang->setting->product->fields['statusList'] = 'Product status';

$lang->setting->customer = new stdClass();
$lang->setting->customer->fields['typeList'] = 'Customer levels';

$lang->setting->allLang     = 'For all language';
$lang->setting->currentLang = 'For current language';

$lang->setting->placeholder = new stdclass();
$lang->setting->placeholder->key   = 'Key';
$lang->setting->placeholder->value = 'Translation';

$lang->setting->placeholder->typeList  = 'Key should be 1~30 letters';
$lang->setting->placeholder->sizeList  = 'Key should be interger between 0 and 255';
$lang->setting->placeholder->levelList = 'Key should be 1~10 letters';
