<?php
/**
 * The en file of crm contract module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contract 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->contract)) $lang->contract = new stdclass();
$lang->contract->common = 'Contract';

$lang->contract->id            = 'ID';
$lang->contract->order         = 'Order';
$lang->contract->customer      = 'Customer';
$lang->contract->name          = 'Name';
$lang->contract->code          = 'Code';
$lang->contract->amount        = 'Amount';
$lang->contract->items         = 'Items';
$lang->contract->begin         = 'Start Date';
$lang->contract->end           = 'End Date';
$lang->contract->dateRange     = 'Date Range';
$lang->contract->delivery      = 'Delivery';
$lang->contract->deliveredBy   = 'Delivered By';
$lang->contract->deliveredDate = 'Delivered Date';
$lang->contract->return        = 'Received payments';
$lang->contract->returnedBy    = 'Received By';
$lang->contract->returnedDate  = 'Received Date';
$lang->contract->status        = 'Status';
$lang->contract->contact       = 'Contact';
$lang->contract->signedBy      = 'Signed By';
$lang->contract->signedDate    = 'Signature Date';
$lang->contract->finishedBy    = 'Finished By';
$lang->contract->finishedDate  = 'Finished Date';
$lang->contract->canceledBy    = 'Canceled By';
$lang->contract->canceledDate  = 'Canceled Date';
$lang->contract->createdBy     = 'Created By';
$lang->contract->createdDate   = 'Created Date';
$lang->contract->editedBy      = 'Edited By';
$lang->contract->editedDate    = 'Edited Date';
$lang->contract->handlers      = 'Handlers';

$lang->contract->browse     = 'Browse Contract';
$lang->contract->receive    = 'Receive';
$lang->contract->cancel     = 'Cancel Contract';
$lang->contract->view       = 'View Contract';
$lang->contract->finish     = 'Finish Contract';
$lang->contract->delete     = 'Delete Contract';
$lang->contract->list       = 'Contract List';
$lang->contract->create     = 'Create Contract';
$lang->contract->edit       = 'Edit';
$lang->contract->setting    = 'Settings';
$lang->contract->uploadFile = 'Upload Files';
$lang->contract->lifetime   = 'Lifetime';

$lang->contract->deliveryList[]        = '';
$lang->contract->deliveryList['wait']  = 'Pending';
$lang->contract->deliveryList['done']  = 'Done';

$lang->contract->returnList[]        = '';
$lang->contract->returnList['wait']  = 'Pending';
$lang->contract->returnList['done']  = 'Done';

$lang->contract->statusList[]           = '';
$lang->contract->statusList['normal']   = 'Normal';
$lang->contract->statusList['closed']   = 'Closed';
$lang->contract->statusList['canceled'] = 'Canceled';

$lang->contract->codeUnitList[]        = '';
$lang->contract->codeUnitList['Y']     = 'Year';
$lang->contract->codeUnitList['m']     = 'Month';
$lang->contract->codeUnitList['d']     = 'Day';
$lang->contract->codeUnitList['fix']   = 'Fix';
$lang->contract->codeUnitList['input'] = 'Input';

$lang->contract->placeholder = new stdclass();
$lang->contract->placeholder->real = 'Turnover';
