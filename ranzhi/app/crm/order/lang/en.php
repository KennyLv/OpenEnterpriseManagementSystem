<?php
/**
 * The order module en lang file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->order)) $lang->order = new stdclass();
$lang->order->common        = 'Order';
$lang->order->id            = 'ID';
$lang->order->name          = 'Name';
$lang->order->product       = 'Product';
$lang->order->customer      = 'Customer';
$lang->order->contact       = 'Contact';
$lang->order->team          = 'Team';
$lang->order->plan          = 'Planned Amount';
$lang->order->real          = 'Real Amount';
$lang->order->amount        = 'Amount';
$lang->order->status        = 'Status';
$lang->order->createdBy     = 'Created By';
$lang->order->createdDate   = 'Created Date';
$lang->order->assignedTo    = 'Assigned to';
$lang->order->assignedBy    = 'Assigned By';
$lang->order->assignedDate  = 'Assigned Date';
$lang->order->signedBy      = 'Signed By';
$lang->order->signedDate    = 'Signed Date';
$lang->order->payedDate     = 'Payed Date';
$lang->order->closedBy      = 'Closed By';
$lang->order->closedDate    = 'Closed Date';
$lang->order->closedReason  = 'Closed Reason';
$lang->order->closedNote    = 'Closed Note';
$lang->order->activatedBy   = 'Activated By';
$lang->order->activatedDate = 'Activated Date';
$lang->order->contactedBy   = 'Contacted By';
$lang->order->contactedDate = 'Contacted Date';
$lang->order->nextDate      = 'Next contact';

$lang->order->list          = 'Order List';
$lang->order->browse        = 'Browse Order';
$lang->order->create        = 'Create';
$lang->order->record        = 'History';
$lang->order->edit          = 'Edit';
$lang->order->view          = 'View';
$lang->order->close         = 'Close';
$lang->order->sign          = 'Sign';
$lang->order->assign        = 'Assign Order';
$lang->order->activate      = 'Activate';

$lang->order->statusList['normal'] = 'Normal';
$lang->order->statusList['signed'] = 'Signed';
$lang->order->statusList['closed'] = 'Closed';

$lang->order->closedReasonList['']          = '';
$lang->order->closedReasonList['payed']     = 'Payed';
$lang->order->closedReasonList['failed']    = 'Failed';
$lang->order->closedReasonList['postponed'] = 'Postponed';

$lang->order->titleLBL  = "[%s] %s buy %s";
$lang->order->basicInfo = "Basic";
$lang->order->lifetime  = "Lifetime";
