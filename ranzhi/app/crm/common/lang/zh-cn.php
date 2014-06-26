<?php
/**
 * The zh-cn file of crm common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->app = new stdclass();
$lang->app->name = 'CRM';

$lang->menu->crm = new stdclass();
$lang->menu->crm->dashboard = '我的地盘|dashboard|index|';
$lang->menu->crm->order     = '订单|order|index|';
$lang->menu->crm->contract  = '合同|contract|index|';
$lang->menu->crm->customer  = '客户|customer|index|';
$lang->menu->crm->contact   = '联系人|contact|index|';
$lang->menu->crm->product   = '产品|product|index|';
$lang->menu->crm->setting   = '设置|setting|lang|module=product&field=statusList';

/* Menu of customer module. */
$lang->customer = new stdclass();
$lang->customer->menu = new stdclass();
$lang->customer->menu->browse = array('link' => '<i class="icon-group"></i> 客户列表|customer|browse|', 'alias' => 'create,edit,view,record');

/* Menu of product module. */
$lang->product = new stdclass();
$lang->product->menu = new stdclass();
$lang->product->menu->browse = array('link' => '<i class="icon-th"></i> 产品列表|product|browse|', 'alias' => 'create,edit');

/* Menu of order module. */
$lang->order = new stdclass();
$lang->order->menu = new stdclass();
$lang->order->menu->browse = array('link' => '<i class="icon-th-list"></i> 订单列表|order|browse|', 'alias' => 'create,edit,view');

/* Menu of contact module. */
$lang->contact = new stdclass();
$lang->contact->menu = new stdclass();
$lang->contact->menu->browse = array('link' => '<i class="icon-th-list"></i> 联系人列表|contact|browse|', 'alias' => 'create,edit,view,history');

/* Menu of contract module. */
$lang->contract = new stdclass();
$lang->contract->menu = new stdclass();
$lang->contract->menu->browse = array('link' => '<i class="icon-th-list"></i> 合同列表|contract|browse|', 'alias' => 'create,edit,view');

/* Menu of setting module. */
$lang->setting = new stdclass();
$lang->setting->menu = new stdclass();
$lang->setting->menu->product       = '产品状态|setting|lang|module=product&field=statusList';
$lang->setting->menu->customerType  = '客户类型|setting|lang|module=customer&field=typeList';
$lang->setting->menu->customerSize  = '客户规模|setting|lang|module=customer&field=sizeList';
$lang->setting->menu->customerLevel = '客户等级|setting|lang|module=customer&field=levelList';
$lang->setting->menu->area          = '区域设置|tree|browse|type=area|';
$lang->setting->menu->industry      = '行业设置|tree|browse|type=industry|';

$lang->dashboard = new stdclass();
$lang->resume    = new stdclass();
$lang->address   = new stdclass();
