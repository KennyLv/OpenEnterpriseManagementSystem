<?php
/**
 * The depositor module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->depositor->common          = '账号';
$lang->depositor->id              = '编号';
$lang->depositor->abbr            = '简称';
$lang->depositor->serviceProvider = '服务商';
$lang->depositor->bankProvider    = '开户网点';
$lang->depositor->title           = '账户名称';
$lang->depositor->account         = '开户帐号';
$lang->depositor->bankcode        = '联行号';
$lang->depositor->public          = '对公帐号';
$lang->depositor->type            = '类型';
$lang->depositor->currency        = '货币类型';
$lang->depositor->status          = '状态';
$lang->depositor->createdBy       = '由谁添加';
$lang->depositor->createdDate     = '添加时间';
$lang->depositor->editedBy        = '由谁编辑';
$lang->depositor->editedDate      = '编辑时间';

$lang->depositor->all      = '所有账号';
$lang->depositor->create   = '添加帐号';
$lang->depositor->browse   = '浏览账号';
$lang->depositor->edit     = '编辑帐号';
$lang->depositor->delete   = '删除帐号';
$lang->depositor->view     = '帐号详情';
$lang->depositor->forbid   = '禁用';
$lang->depositor->activate = '激活';
$lang->depositor->balance  = '余额';

$lang->depositor->check         = '对账';
$lang->depositor->start         = '开始日期';
$lang->depositor->end           = '结束日期';
$lang->depositor->originValue   = '起始余额';
$lang->depositor->actualValue   = '实际余额';
$lang->depositor->computedValue = '计算余额';
$lang->depositor->result        = '结果';
$lang->depositor->success       = "<span class='text-success'>对账成功</span>";
$lang->depositor->more          = "<span class='text-danger'>超出实际余额 %s </span>";
$lang->depositor->less          = "<span class='text-danger'>低于实际余额 %s </span>";

$lang->depositor->typeList['cash']   = '现金帐号';
$lang->depositor->typeList['bank']   = '借记卡';
$lang->depositor->typeList['online'] = '在线支付';

$lang->depositor->publicList['1'] = '对公帐号';
$lang->depositor->publicList['0'] = '个人帐号';

$lang->depositor->providerList['']       = '';
$lang->depositor->providerList['alipay'] = '支付宝';
$lang->depositor->providerList['paypal'] = '贝宝';
$lang->depositor->providerList['tenpay'] = '财付通';

$lang->depositor->currencyList['rmb'] = '人民币';
$lang->depositor->currencyList['usd'] = '美元';

$lang->depositor->statusList['normal']  = '正常';
$lang->depositor->statusList['disable'] = '停用';
