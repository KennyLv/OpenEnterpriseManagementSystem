<?php
/**
 * The order module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->order)) $lang->order = new stdclass();
$lang->order->common        = '订单';
$lang->order->id            = '编号';
$lang->order->name          = '名称';
$lang->order->product       = '产品';
$lang->order->customer      = '客户';
$lang->order->contact       = '联系人';
$lang->order->team          = '团队';
$lang->order->plan          = '计划金额';
$lang->order->real          = '成交金额';
$lang->order->amount        = '金额';
$lang->order->status        = '状态';
$lang->order->createdBy     = '由谁创建';
$lang->order->createdDate   = '创建时间';
$lang->order->assignedTo    = '指派给';
$lang->order->assignedBy    = '由谁指派';
$lang->order->assignedDate  = '指派时间';
$lang->order->signedBy      = '由谁签单';
$lang->order->signedDate    = '签单时间';
$lang->order->payedDate     = '付款时间';
$lang->order->closedBy      = '由谁关闭';
$lang->order->closedDate    = '关闭时间';
$lang->order->closedReason  = '关闭原因';
$lang->order->closedNote    = '备注';
$lang->order->activatedBy   = '由谁激活';
$lang->order->activatedDate = '激活时间';
$lang->order->contactedBy   = '由谁联系';
$lang->order->contactedDate = '联系时间';
$lang->order->nextDate      = '下次联系';

$lang->order->list          = '订单列表';
$lang->order->browse        = '浏览订单';
$lang->order->create        = '创建订单';
$lang->order->record        = '沟通';
$lang->order->edit          = '编辑订单';
$lang->order->view          = '订单详情';
$lang->order->close         = '关闭订单';
$lang->order->sign          = '签约';
$lang->order->assign        = '订单指派';
$lang->order->activate      = '激活';

$lang->order->statusList['normal'] = '正常';
$lang->order->statusList['signed'] = '已签约';
$lang->order->statusList['closed'] = '已关闭';

$lang->order->closedReasonList['']          = '';
$lang->order->closedReasonList['payed']     = '已付款';
$lang->order->closedReasonList['failed']    = '订单失败';
$lang->order->closedReasonList['postponed'] = '延期';

$lang->order->titleLBL  = "[%s] %s购买%s";
$lang->order->basicInfo = "基本信息";
$lang->order->lifetime  = "订单的一生";
