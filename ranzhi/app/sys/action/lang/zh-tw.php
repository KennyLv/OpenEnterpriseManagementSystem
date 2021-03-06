<?php
/**
 * The lang file of zh-tw module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     action
 * @version     $Id: zh-tw.php 4955 2013-07-02 01:47:21Z chencongzhi520@gmail.com $
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->action)) $lang->action = new stdclass();

$lang->action->common   = '系統日誌';
$lang->action->product  = '產品';
$lang->action->actor    = '操作者';
$lang->action->contact  = '聯繫人';
$lang->action->comment  = '內容';
$lang->action->action   = '動作';
$lang->action->actionID = '記錄ID';
$lang->action->date     = '日期';

$lang->action->editComment = '修改備註';

$lang->action->textDiff = '文本格式';
$lang->action->original = '原始格式';

/* 用來描述操作歷史記錄。*/
$lang->action->desc = new stdclass();
$lang->action->desc->common        = '$date, <strong>$action</strong> by <strong>$actor</strong>。' . "\n";
$lang->action->desc->extra         = '$date, <strong>$action</strong> as <strong>$extra</strong> by <strong>$actor</strong>。' . "\n";
$lang->action->desc->opened        = '$date, 由 <strong>$actor</strong> 創建。' . "\n";
$lang->action->desc->created       = '$date, 由 <strong>$actor</strong> 創建。' . "\n";
$lang->action->desc->edited        = '$date, 由 <strong>$actor</strong> 編輯。' . "\n";
$lang->action->desc->assigned      = '$date, 由 <strong>$actor</strong> 指派給 <strong>$extra</strong>。' . "\n";
$lang->action->desc->closed        = '$date, 由 <strong>$actor</strong> 關閉，關閉原因: <strong>$extra</strong>。' . "\n";
$lang->action->desc->deleted       = '$date, 由 <strong>$actor</strong> 刪除。' . "\n";
$lang->action->desc->deletedfile   = '$date, 由 <strong>$actor</strong> 刪除了附件：<strong><i>$extra</i></strong>。' . "\n";
$lang->action->desc->editfile      = '$date, 由 <strong>$actor</strong> 編輯了附件：<strong><i>$extra</i></strong>。' . "\n";
$lang->action->desc->erased        = '$date, 由 <strong>$actor</strong> 刪除。' . "\n";
$lang->action->desc->commented     = '$date, 由 <strong>$actor</strong> 添加備註。' . "\n";
$lang->action->desc->activated     = '$date, 由 <strong>$actor</strong> 激活。' . "\n";
$lang->action->desc->moved         = '$date, 由 <strong>$actor</strong> 移動，之前為 "$extra"。' . "\n";
$lang->action->desc->started       = '$date, 由 <strong>$actor</strong> 啟動。' . "\n";
$lang->action->desc->delayed       = '$date, 由 <strong>$actor</strong> 延期。' . "\n";
$lang->action->desc->suspended     = '$date, 由 <strong>$actor</strong> 掛起。' . "\n";
$lang->action->desc->canceled      = '$date, 由 <strong>$actor</strong> 取消。' . "\n";
$lang->action->desc->finished      = '$date, 由 <strong>$actor</strong> 完成。' . "\n";
$lang->action->desc->replied       = '$date, 由 <strong>$actor</strong> 回覆。' . "\n";
$lang->action->desc->doubted       = '$date, 由 <strong>$actor</strong> 追問。' . "\n";
$lang->action->desc->transfered    = '$date, 由 <strong>$actor</strong> 轉交。' . "\n";
$lang->action->desc->returned      = '$date, 由 <strong>$actor</strong> 完成回款。' . "\n";
$lang->action->desc->delivered     = '$date, 由 <strong>$actor</strong> 完成支付。' . "\n";
$lang->action->desc->createdresume = '$date, 由 <strong>$actor</strong> 添加履歷。' . "\n";
$lang->action->desc->editedresume  = '$date, 由 <strong>$actor</strong> 修改履歷。' . "\n";
$lang->action->desc->createaddress = '$date, 由 <strong>$actor</strong> 添加地址。' . "\n";
$lang->action->desc->editaddress   = '$date, 由 <strong>$actor</strong> 修改地址。' . "\n";
$lang->action->desc->diff1         = '修改了 <strong><i>%s</i></strong>，舊值為 "%s"，新值為 "%s"。<br />' . "\n";
$lang->action->desc->diff2         = '修改了 <strong><i>%s</i></strong>，區別為：' . "\n" . "<blockquote>%s</blockquote>" . "\n<div class='hidden'>%s</div>";
$lang->action->desc->diff3         = "將檔案名 %s 改為 %s 。\n";
$lang->action->desc->record        = '$date, <strong>$actor</strong> 添加了溝通日誌，聯繫人： <strong>$contact</strong>。' . "\n";
$lang->action->desc->signed        = '$date, 由 <strong>$actor</strong> 簽約，成交金額： <strong>$extra</strong>。' . "\n";

/* 用來顯示動態信息。*/
$lang->action->label = new stdclass();
$lang->action->label->created     = '創建了';
$lang->action->label->edited      = '編輯了';
$lang->action->label->assigned    = '指派了';
$lang->action->label->closed      = '關閉了';
$lang->action->label->deleted     = '刪除了';
$lang->action->label->deletedfile = '刪除附件';
$lang->action->label->editfile    = '編輯附件';
$lang->action->label->commented   = '評論了';
$lang->action->label->activated   = '激活了';
$lang->action->label->resolved    = '解決了';
$lang->action->label->reviewed    = '評審了';
$lang->action->label->moved       = '移動了';
$lang->action->label->marked      = '編輯了';
$lang->action->label->started     = '開始了';
$lang->action->label->canceled    = '取消了';
$lang->action->label->finished    = '完成了';
$lang->action->label->login       = '登錄系統';
$lang->action->label->logout      = "退出登錄";

/* 用來生成相應對象的連結。*/
$lang->action->label->product  = '產品|product|view|productID=%s';
$lang->action->label->order    = '訂單|order|view|orderID=%s';
$lang->action->label->task     = '任務|task|view|taskID=%s';
$lang->action->label->contract = '合同|contract|view|contractID=%s';
$lang->action->label->user     = '成員|user|view|account=%s';
$lang->action->label->space    = '　';

/* Object type. */
$lang->action->search->objectTypeList['']            = '';    
$lang->action->search->objectTypeList['product']     = '產品';    
$lang->action->search->objectTypeList['task']        = '任務'; 
$lang->action->search->objectTypeList['user']        = '成員'; 
$lang->action->search->objectTypeList['order']       = '訂單'; 
$lang->action->search->objectTypeList['contract']    = '合同'; 
$lang->action->search->objectTypeList['orderAction'] = '動作'; 

/* 用來在動態顯示中顯示動作 */
$lang->action->search->label['']            = '';
$lang->action->search->label['created']     = $lang->action->label->created;            
$lang->action->search->label['edited']      = $lang->action->label->edited;             
$lang->action->search->label['assigned']    = $lang->action->label->assigned;           
$lang->action->search->label['closed']      = $lang->action->label->closed;             
$lang->action->search->label['deleted']     = $lang->action->label->deleted;            
$lang->action->search->label['deletedfile'] = $lang->action->label->deletedfile;        
$lang->action->search->label['editfile']    = $lang->action->label->editfile;           
$lang->action->search->label['commented']   = $lang->action->label->commented;          
$lang->action->search->label['activated']   = $lang->action->label->activated;          
$lang->action->search->label['resolved']    = $lang->action->label->resolved;           
$lang->action->search->label['reviewed']    = $lang->action->label->reviewed;           
$lang->action->search->label['moved']       = $lang->action->label->moved;              
$lang->action->search->label['started']     = $lang->action->label->started;            
$lang->action->search->label['canceled']    = $lang->action->label->canceled;           
$lang->action->search->label['finished']    = $lang->action->label->finished;           
$lang->action->search->label['login']       = $lang->action->label->login;              
$lang->action->search->label['logout']      = $lang->action->label->logout;

$lang->action->record = new stdclass();
$lang->action->record->common   = '溝通';
$lang->action->record->create   = '添加記錄';
$lang->action->record->edit     = '編輯記錄';
$lang->action->record->history  = '溝通記錄';
$lang->action->record->customer = '客戶';
$lang->action->record->contract = '合同';
$lang->action->record->order    = '訂單';
$lang->action->record->contact  = '聯繫人';
$lang->action->record->actor    = '操作人';
$lang->action->record->comment  = '溝通內容';
$lang->action->record->date     = '時間';
