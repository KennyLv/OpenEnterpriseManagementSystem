<?php
/**
 * The product module en file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if(!isset($lang->product)) $lang->product = new stdclass();
$lang->product->common = 'Product';

$lang->product->id          = 'ID';
$lang->product->name        = 'Name';
$lang->product->code        = 'Code';
$lang->product->type        = 'Type';
$lang->product->status      = 'Status';
$lang->product->desc        = 'Introductions';
$lang->product->roles       = 'Roles';
$lang->product->createdBy   = 'Created By';
$lang->product->createdDate = 'Created Date';
$lang->product->editedBy    = 'Edited By';
$lang->product->editedDate  = 'Edited Date';

$lang->product->index       = 'Browse Product';
$lang->product->delete      = 'Delete Product';
$lang->product->list        = 'List';
$lang->product->browse      = 'Browse';
$lang->product->create      = 'Create';
$lang->product->edit        = 'Edit';

$lang->product->typeList['real']    = 'Real';
$lang->product->typeList['service'] = 'Service';
$lang->product->typeList['virtual'] = 'Virtual';

$lang->product->statusList['developing'] = 'Developing';
$lang->product->statusList['normal']     = 'Normal';
$lang->product->statusList['offline']    = 'Offline';
