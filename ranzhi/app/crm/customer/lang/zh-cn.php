<?php
/**
 * The customer module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->customer)) $lang->customer = new stdclass();

$lang->customer->common      = '客户维护';
$lang->customer->id          = '编号';
$lang->customer->name        = '名称';
$lang->customer->contact     = '联系人';
$lang->customer->type        = '类型';
$lang->customer->size        = '规模';
$lang->customer->industry    = '行业';
$lang->customer->area        = '区域';
$lang->customer->status      = '状态';
$lang->customer->level       = '级别';
$lang->customer->intension   = '购买意向';
$lang->customer->phone       = '电话';
$lang->customer->email       = '邮箱';
$lang->customer->qq          = 'QQ';
$lang->customer->site        = '网站';
$lang->customer->weibo       = '微博';
$lang->customer->weixin      = '微信';
$lang->customer->desc        = '简介';
$lang->customer->createdBy   = '由谁添加';
$lang->customer->createdDate = '添加时间';
$lang->customer->editedBy    = '由谁编辑';
$lang->customer->editedDate  = '编辑时间';
$lang->customer->contactBy   = '由谁联系';
$lang->customer->contactDate = '最后联系';
$lang->customer->nextDate    = '下次联系';
$lang->customer->newContact  = '新建联系人';

$lang->customer->browse      = '浏览客户';
$lang->customer->delete      = '删除客户';
$lang->customer->order       = '订单';
$lang->customer->contact     = '联系人';
$lang->customer->contract    = '合同';
$lang->customer->address     = '地址';
$lang->customer->record      = '沟通';
$lang->customer->linkContact = '添加联系人';

$lang->customer->typeList['']           = '';
$lang->customer->typeList['national']   = '国有企业';
$lang->customer->typeList['collective'] = '集体企业';
$lang->customer->typeList['corporate']  = '股份企业';
$lang->customer->typeList['limited']    = '有限公司';
$lang->customer->typeList['partnership']= '合伙企业';
$lang->customer->typeList['foreign']    = '外资企业';
$lang->customer->typeList['personal']   = '个人个体';

$lang->customer->statusList['']          = '';
$lang->customer->statusList['potential'] = '潜在';
$lang->customer->statusList['intension'] = '意向';
$lang->customer->statusList['payed']     = '已付款';
$lang->customer->statusList['failed']    = '失败';

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

$lang->customer->create = '添加客户';
$lang->customer->list   = '客户列表';
$lang->customer->edit   = '编辑客户';
$lang->customer->view   = '客户详情';

$lang->customer->basicInfo = '基本信息';
$lang->customer->moreInfo  = '更多信息';
