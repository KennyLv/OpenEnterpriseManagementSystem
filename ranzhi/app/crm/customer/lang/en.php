<?php
/**
 * The customer module en file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->customer)) $lang->customer = new stdclass();

$lang->customer->common      = 'Customer';
$lang->customer->id          = 'ID';
$lang->customer->name        = 'Name';
$lang->customer->contact     = 'Contact';
$lang->customer->type        = 'Type';
$lang->customer->size        = 'Size';
$lang->customer->industry    = 'Industry';
$lang->customer->area        = 'Area';
$lang->customer->status      = 'Status';
$lang->customer->level       = 'Level';
$lang->customer->intension   = 'Intention';
$lang->customer->phone       = 'Phone';
$lang->customer->email       = 'Email';
$lang->customer->qq          = 'QQ';
$lang->customer->site        = 'Site';
$lang->customer->weibo       = 'Sina Weibo';
$lang->customer->weixin      = 'Wechat';
$lang->customer->desc        = 'Description';
$lang->customer->createdBy   = 'Created By';
$lang->customer->createdDate = 'Created Date';
$lang->customer->editedBy    = 'Edited By';
$lang->customer->editedDate  = 'Edited Date';
$lang->customer->contactBy   = 'Contact By';
$lang->customer->contactDate = 'Contact Date';
$lang->customer->nextDate    = 'Next Date';
$lang->customer->newContact  = 'Create Contact';

$lang->customer->browse      = 'Browse Customer';
$lang->customer->delete      = 'Delete Customer';
$lang->customer->order       = 'Order List';
$lang->customer->contact     = 'Contact List';
$lang->customer->contract    = 'Contract List';
$lang->customer->address     = 'Address List';
$lang->customer->record      = 'Record';
$lang->customer->linkContact = 'Create Contact';

$lang->customer->typeList['']           = '';
$lang->customer->typeList['national']   = 'National';
$lang->customer->typeList['collective'] = 'Collective';
$lang->customer->typeList['corporate']  = 'Corporate';
$lang->customer->typeList['limited']    = 'Limited';
$lang->customer->typeList['partnership']= 'Partnership';
$lang->customer->typeList['foreign']    = 'Foreign';
$lang->customer->typeList['personal']   = 'Personal';

$lang->customer->statusList['']          = '';
$lang->customer->statusList['potential'] = 'Potential';
$lang->customer->statusList['intension'] = 'Intension';
$lang->customer->statusList['payed']     = 'Payed';
$lang->customer->statusList['failed']    = 'Failed';

$lang->customer->sizeList[0] = '';
$lang->customer->sizeList[1] = 'Large(>100persons)';
$lang->customer->sizeList[2] = 'Medium(50-100 persons)';
$lang->customer->sizeList[3] = 'Small(10-50 persons)';
$lang->customer->sizeList[4] = 'Mini(<10 persons)';

$lang->customer->levelList[]  = '';
$lang->customer->levelList['A'] = 'A';
$lang->customer->levelList['B'] = 'B';
$lang->customer->levelList['C'] = 'C';
$lang->customer->levelList['D'] = 'D';
$lang->customer->levelList['E'] = 'E';

$lang->customer->create = 'Create Customer';
$lang->customer->list   = 'Customer List';
$lang->customer->edit   = 'Edit';
$lang->customer->view   = 'View';

$lang->customer->basicInfo = 'Basic Info';
$lang->customer->moreInfo  = 'More Info';
