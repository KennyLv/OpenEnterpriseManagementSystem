<?php
/**
 * The zh-tw file of setting module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     setting 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->setting->common = '自定義';
$lang->setting->reset  = '恢復預設';
$lang->setting->key    = '鍵';
$lang->setting->value  = '值';

$lang->setting->module = new stdClass();
$lang->setting->module->user     = '員工角色';
$lang->setting->module->product  = '產品狀態';
$lang->setting->module->customer = '客戶級別';

$lang->setting->user = new stdClass();
$lang->setting->user->fields['roleList'] = '角色設置';

$lang->setting->product = new stdClass();
$lang->setting->product->fields['statusList'] = '產品狀態';

$lang->setting->customer = new stdClass();
$lang->setting->customer->fields['typeList'] = '客戶級別';

$lang->setting->allLang     = '適用所有語言';
$lang->setting->currentLang = '適用當前語言';

$lang->setting->placeholder = new stdclass();
$lang->setting->placeholder->key   = '變數名';
$lang->setting->placeholder->value = '自定義顯示值';

$lang->setting->placeholder->typeList  = '變數名，長度為1~30字元';
$lang->setting->placeholder->sizeList  = '變數名，必須為0~255的數字';
$lang->setting->placeholder->levelList = '變數名，長度為1~10字元';
