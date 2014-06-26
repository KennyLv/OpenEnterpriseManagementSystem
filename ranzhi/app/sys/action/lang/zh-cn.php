<?php
/**
 * The lang file of zh-cn module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     action
 * @version     $Id: zh-cn.php 4955 2013-07-02 01:47:21Z chencongzhi520@gmail.com $
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->action)) $lang->action = new stdclass();

$lang->action->common   = '系统日志';
$lang->action->product  = '产品';
$lang->action->actor    = '操作者';
$lang->action->contact  = '联系人';
$lang->action->comment  = '内容';
$lang->action->action   = '动作';
$lang->action->actionID = '记录ID';
$lang->action->date     = '日期';

$lang->action->editComment = '修改备注';

$lang->action->textDiff = '文本格式';
$lang->action->original = '原始格式';

/* 用来描述操作历史记录。*/
$lang->action->desc = new stdclass();
$lang->action->desc->common        = '$date, <strong>$action</strong> by <strong>$actor</strong>。' . "\n";
$lang->action->desc->extra         = '$date, <strong>$action</strong> as <strong>$extra</strong> by <strong>$actor</strong>。' . "\n";
$lang->action->desc->opened        = '$date, 由 <strong>$actor</strong> 创建。' . "\n";
$lang->action->desc->created       = '$date, 由 <strong>$actor</strong> 创建。' . "\n";
$lang->action->desc->edited        = '$date, 由 <strong>$actor</strong> 编辑。' . "\n";
$lang->action->desc->assigned      = '$date, 由 <strong>$actor</strong> 指派给 <strong>$extra</strong>。' . "\n";
$lang->action->desc->closed        = '$date, 由 <strong>$actor</strong> 关闭，关闭原因: <strong>$extra</strong>。' . "\n";
$lang->action->desc->deleted       = '$date, 由 <strong>$actor</strong> 删除。' . "\n";
$lang->action->desc->deletedfile   = '$date, 由 <strong>$actor</strong> 删除了附件：<strong><i>$extra</i></strong>。' . "\n";
$lang->action->desc->editfile      = '$date, 由 <strong>$actor</strong> 编辑了附件：<strong><i>$extra</i></strong>。' . "\n";
$lang->action->desc->erased        = '$date, 由 <strong>$actor</strong> 删除。' . "\n";
$lang->action->desc->commented     = '$date, 由 <strong>$actor</strong> 添加备注。' . "\n";
$lang->action->desc->activated     = '$date, 由 <strong>$actor</strong> 激活。' . "\n";
$lang->action->desc->moved         = '$date, 由 <strong>$actor</strong> 移动，之前为 "$extra"。' . "\n";
$lang->action->desc->started       = '$date, 由 <strong>$actor</strong> 启动。' . "\n";
$lang->action->desc->delayed       = '$date, 由 <strong>$actor</strong> 延期。' . "\n";
$lang->action->desc->suspended     = '$date, 由 <strong>$actor</strong> 挂起。' . "\n";
$lang->action->desc->canceled      = '$date, 由 <strong>$actor</strong> 取消。' . "\n";
$lang->action->desc->finished      = '$date, 由 <strong>$actor</strong> 完成。' . "\n";
$lang->action->desc->replied       = '$date, 由 <strong>$actor</strong> 回复。' . "\n";
$lang->action->desc->doubted       = '$date, 由 <strong>$actor</strong> 追问。' . "\n";
$lang->action->desc->transfered    = '$date, 由 <strong>$actor</strong> 转交。' . "\n";
$lang->action->desc->returned      = '$date, 由 <strong>$actor</strong> 完成回款。' . "\n";
$lang->action->desc->delivered     = '$date, 由 <strong>$actor</strong> 完成支付。' . "\n";
$lang->action->desc->createdresume = '$date, 由 <strong>$actor</strong> 添加履历。' . "\n";
$lang->action->desc->editedresume  = '$date, 由 <strong>$actor</strong> 修改履历。' . "\n";
$lang->action->desc->createaddress = '$date, 由 <strong>$actor</strong> 添加地址。' . "\n";
$lang->action->desc->editaddress   = '$date, 由 <strong>$actor</strong> 修改地址。' . "\n";
$lang->action->desc->diff1         = '修改了 <strong><i>%s</i></strong>，旧值为 "%s"，新值为 "%s"。<br />' . "\n";
$lang->action->desc->diff2         = '修改了 <strong><i>%s</i></strong>，区别为：' . "\n" . "<blockquote>%s</blockquote>" . "\n<div class='hidden'>%s</div>";
$lang->action->desc->diff3         = "将文件名 %s 改为 %s 。\n";
$lang->action->desc->record        = '$date, <strong>$actor</strong> 添加了沟通日志，联系人： <strong>$contact</strong>。' . "\n";
$lang->action->desc->signed        = '$date, 由 <strong>$actor</strong> 签约，成交金额： <strong>$extra</strong>。' . "\n";

/* 用来显示动态信息。*/
$lang->action->label = new stdclass();
$lang->action->label->created     = '创建了';
$lang->action->label->edited      = '编辑了';
$lang->action->label->assigned    = '指派了';
$lang->action->label->closed      = '关闭了';
$lang->action->label->deleted     = '删除了';
$lang->action->label->deletedfile = '删除附件';
$lang->action->label->editfile    = '编辑附件';
$lang->action->label->commented   = '评论了';
$lang->action->label->activated   = '激活了';
$lang->action->label->resolved    = '解决了';
$lang->action->label->reviewed    = '评审了';
$lang->action->label->moved       = '移动了';
$lang->action->label->marked      = '编辑了';
$lang->action->label->started     = '开始了';
$lang->action->label->canceled    = '取消了';
$lang->action->label->finished    = '完成了';
$lang->action->label->login       = '登录系统';
$lang->action->label->logout      = "退出登录";

/* 用来生成相应对象的链接。*/
$lang->action->label->product  = '产品|product|view|productID=%s';
$lang->action->label->order    = '订单|order|view|orderID=%s';
$lang->action->label->task     = '任务|task|view|taskID=%s';
$lang->action->label->contract = '合同|contract|view|contractID=%s';
$lang->action->label->user     = '成员|user|view|account=%s';
$lang->action->label->space    = '　';

/* Object type. */
$lang->action->search->objectTypeList['']            = '';    
$lang->action->search->objectTypeList['product']     = '产品';    
$lang->action->search->objectTypeList['task']        = '任务'; 
$lang->action->search->objectTypeList['user']        = '成员'; 
$lang->action->search->objectTypeList['order']       = '订单'; 
$lang->action->search->objectTypeList['contract']    = '合同'; 
$lang->action->search->objectTypeList['orderAction'] = '动作'; 

/* 用来在动态显示中显示动作 */
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
$lang->action->record->common   = '沟通';
$lang->action->record->create   = '添加记录';
$lang->action->record->edit     = '编辑记录';
$lang->action->record->history  = '沟通记录';
$lang->action->record->customer = '客户';
$lang->action->record->contract = '合同';
$lang->action->record->order    = '订单';
$lang->action->record->contact  = '联系人';
$lang->action->record->actor    = '操作人';
$lang->action->record->comment  = '沟通内容';
$lang->action->record->date     = '时间';
