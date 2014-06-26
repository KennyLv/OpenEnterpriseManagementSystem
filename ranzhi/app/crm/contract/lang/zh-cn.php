<?php
/**
 * The zh-cn file of crm contract module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->contract)) $lang->contract = new stdclass();
$lang->contract->common = '合同';

$lang->contract->id            = '编号';
$lang->contract->order         = '签约订单';
$lang->contract->customer      = '所属客户';
$lang->contract->name          = '名称';
$lang->contract->code          = '代号';
$lang->contract->amount        = '金额';
$lang->contract->items         = '条款';
$lang->contract->begin         = '开始日期';
$lang->contract->end           = '结束日期';
$lang->contract->dateRange     = '起始日期';
$lang->contract->delivery      = '交付';
$lang->contract->deliveredBy   = '由谁交付';
$lang->contract->deliveredDate = '交付时间';
$lang->contract->return        = '回款';
$lang->contract->returnedBy    = '由谁回款';
$lang->contract->returnedDate  = '回款时间';
$lang->contract->status        = '状态';
$lang->contract->contact       = '联系人';
$lang->contract->signedBy      = '由谁签署';
$lang->contract->signedDate    = '签署日期';
$lang->contract->finishedBy    = '由谁完成';
$lang->contract->finishedDate  = '完成时间';
$lang->contract->canceledBy    = '由谁取消';
$lang->contract->canceledDate  = '取消时间';
$lang->contract->createdBy     = '由谁创建';
$lang->contract->createdDate   = '创建时间';
$lang->contract->editedBy      = '最后修改';
$lang->contract->editedDate    = '最后修改时间';
$lang->contract->handlers      = '经手人';

$lang->contract->browse     = '浏览合同';
$lang->contract->receive    = '回款';
$lang->contract->cancel     = '取消合同';
$lang->contract->view       = '合同详情';
$lang->contract->finish     = '完成合同';
$lang->contract->delete     = '删除合同';
$lang->contract->list       = '合同列表';
$lang->contract->create     = '创建合同';
$lang->contract->edit       = '编辑合同';
$lang->contract->setting    = '系统设置';
$lang->contract->uploadFile = '上传附件';
$lang->contract->lifetime   = '合同的一生';

$lang->contract->deliveryList[]        = '';
$lang->contract->deliveryList['wait']  = '等待交付';
$lang->contract->deliveryList['done']  = '交付完成';

$lang->contract->returnList[]        = '';
$lang->contract->returnList['wait']  = '等待回款';
$lang->contract->returnList['done']  = '回款完成';

$lang->contract->statusList[]           = '';
$lang->contract->statusList['normal']   = '正常';
$lang->contract->statusList['closed']   = '已完成';
$lang->contract->statusList['canceled'] = '已取消';

$lang->contract->codeUnitList[]        = '';
$lang->contract->codeUnitList['Y']     = '年';
$lang->contract->codeUnitList['m']     = '月';
$lang->contract->codeUnitList['d']     = '日';
$lang->contract->codeUnitList['fix']   = '固定值';
$lang->contract->codeUnitList['input'] = '输入值';

$lang->contract->placeholder = new stdclass();
$lang->contract->placeholder->real = '成交金额';
