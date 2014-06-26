<?php
/**
 * The customer module zh-tw file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->customer)) $lang->customer = new stdclass();

$lang->customer->common      = '客戶維護';
$lang->customer->id          = '編號';
$lang->customer->name        = '名稱';
$lang->customer->contact     = '聯繫人';
$lang->customer->type        = '類型';
$lang->customer->size        = '規模';
$lang->customer->industry    = '行業';
$lang->customer->area        = '區域';
$lang->customer->status      = '狀態';
$lang->customer->level       = '級別';
$lang->customer->intension   = '購買意向';
$lang->customer->phone       = '電話';
$lang->customer->email       = '郵箱';
$lang->customer->qq          = 'QQ';
$lang->customer->site        = '網站';
$lang->customer->weibo       = '微博';
$lang->customer->weixin      = '微信';
$lang->customer->desc        = '簡介';
$lang->customer->createdBy   = '由誰添加';
$lang->customer->createdDate = '添加時間';
$lang->customer->editedBy    = '由誰編輯';
$lang->customer->editedDate  = '編輯時間';
$lang->customer->contactBy   = '由誰聯繫';
$lang->customer->contactDate = '最後聯繫';
$lang->customer->nextDate    = '下次聯繫';
$lang->customer->newContact  = '新建聯繫人';

$lang->customer->browse      = '瀏覽客戶';
$lang->customer->delete      = '刪除客戶';
$lang->customer->order       = '訂單';
$lang->customer->contact     = '聯繫人';
$lang->customer->contract    = '合同';
$lang->customer->address     = '地址';
$lang->customer->record      = '溝通';
$lang->customer->linkContact = '添加聯繫人';

$lang->customer->typeList['']           = '';
$lang->customer->typeList['national']   = '國有企業';
$lang->customer->typeList['collective'] = '集體企業';
$lang->customer->typeList['corporate']  = '股份企業';
$lang->customer->typeList['limited']    = '有限公司';
$lang->customer->typeList['partnership']= '合夥企業';
$lang->customer->typeList['foreign']    = '外資企業';
$lang->customer->typeList['personal']   = '個人個體';

$lang->customer->statusList['']          = '';
$lang->customer->statusList['potential'] = '潛在';
$lang->customer->statusList['intension'] = '意向';
$lang->customer->statusList['payed']     = '已付款';
$lang->customer->statusList['failed']    = '失敗';

$lang->customer->sizeList[0] = '';
$lang->customer->sizeList[1] = '大型(100人以上)';
$lang->customer->sizeList[2] = '中型(50-100人)';
$lang->customer->sizeList[3] = '小型(10人-50人)';
$lang->customer->sizeList[4] = '微型(10人以下)';

$lang->customer->levelList[]    = '';
$lang->customer->levelList['A'] = 'A';
$lang->customer->levelList['B'] = 'B';
$lang->customer->levelList['C'] = 'C';
$lang->customer->levelList['D'] = 'D';
$lang->customer->levelList['E'] = 'E';

$lang->customer->create = '添加客戶';
$lang->customer->list   = '客戶列表';
$lang->customer->edit   = '編輯客戶';
$lang->customer->view   = '客戶詳情';

$lang->customer->basicInfo = '基本信息';
$lang->customer->moreInfo  = '更多信息';
