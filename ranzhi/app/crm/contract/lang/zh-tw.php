<?php
/**
 * The zh-tw file of crm contract module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->contract)) $lang->contract = new stdclass();
$lang->contract->common = '合同';

$lang->contract->id            = '編號';
$lang->contract->order         = '簽約訂單';
$lang->contract->customer      = '所屬客戶';
$lang->contract->name          = '名稱';
$lang->contract->code          = '代號';
$lang->contract->amount        = '金額';
$lang->contract->items         = '條款';
$lang->contract->begin         = '開始日期';
$lang->contract->end           = '結束日期';
$lang->contract->dateRange     = '起始日期';
$lang->contract->delivery      = '交付';
$lang->contract->deliveredBy   = '由誰交付';
$lang->contract->deliveredDate = '交付時間';
$lang->contract->return        = '回款';
$lang->contract->returnedBy    = '由誰回款';
$lang->contract->returnedDate  = '回款時間';
$lang->contract->status        = '狀態';
$lang->contract->contact       = '聯繫人';
$lang->contract->signedBy      = '由誰簽署';
$lang->contract->signedDate    = '簽署日期';
$lang->contract->finishedBy    = '由誰完成';
$lang->contract->finishedDate  = '完成時間';
$lang->contract->canceledBy    = '由誰取消';
$lang->contract->canceledDate  = '取消時間';
$lang->contract->createdBy     = '由誰創建';
$lang->contract->createdDate   = '創建時間';
$lang->contract->editedBy      = '最後修改';
$lang->contract->editedDate    = '最後修改時間';
$lang->contract->handlers      = '經手人';

$lang->contract->browse     = '瀏覽合同';
$lang->contract->receive    = '回款';
$lang->contract->cancel     = '取消合同';
$lang->contract->view       = '合同詳情';
$lang->contract->finish     = '完成合同';
$lang->contract->delete     = '刪除合同';
$lang->contract->list       = '合同列表';
$lang->contract->create     = '創建合同';
$lang->contract->edit       = '編輯合同';
$lang->contract->setting    = '系統設置';
$lang->contract->uploadFile = '上傳附件';
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
$lang->contract->codeUnitList['input'] = '輸入值';

$lang->contract->placeholder = new stdclass();
$lang->contract->placeholder->real = '成交金額';
