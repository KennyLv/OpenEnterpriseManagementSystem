<?php
/**
 * The edit view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' class='form-condensed'>
  <div class='col-md-8'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class="icon-edit"></i> <?php echo $lang->contract->edit;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-form'>
          <tr>
            <th><?php echo $lang->contract->name;?></th>
            <td colspan='2'><?php echo html::input('name', $contract->name, "class='form-control'");?></td>
          </tr>
          <?php foreach($contractOrders as $currentOrder):?>
          <tr>
            <th class='orderTH'><?php echo $lang->contract->order;?></th>
            <td colspan='2'>
              <div class='form-group'>
                <span class='col-sm-8'>
                  <select name='order[]' class='select-order form-control'>
                    <?php foreach($orders as $order):?>
                    <?php if(!$order):?>
                    <option value='' data-real=''></option>
                    <?php else:?>
                    <?php $selected = $currentOrder->id == $order->id ? "selected='selected'" : '';?>
                    <option value="<?php echo $order->id;?>" <?php echo $selected;?> data-real="<?php echo $order->plan;?>"><?php echo $order->title;?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                  </select>
                </span>
                <span class='col-sm-3'><?php echo html::input('real[]', $currentOrder->real, "class='order-real form-control' placeholder='{$this->lang->contract->placeholder->real}'");?></span>
                <span class='col-sm-1'><?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus'") . html::a('javascript:;', "<i class='icon-minus'></i>", "class='minus'");?></span>
              </div>
            </td>
          </tr>
          <?php endforeach;?>
          <tr>
            <th><?php echo $lang->contract->amount;?></th>
            <td><?php echo html::input('amount', $contract->amount, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->items;?></th>
            <td colspan='2'><?php echo html::textarea('items', $contract->items, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->files;?></th>
            <td colspan='2'><?php echo $this->fetch('file', 'buildForm');?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=contract&objectID={$contract->id}")?>
    <div class='page-actions'><?php echo html::submitButton() . html::backButton();?></div>
  </div>
  <div class='col-md-4'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->basicInfo;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-form'>
          <tr>
            <th class='w-70px'><?php echo $lang->contract->customer;?></th>
            <td><?php echo html::select('customer', $customers, $contract->customer, "class='form-control' disabled");?></td><td></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->delivery;?></th>
            <td><?php echo html::select('delivery', $lang->contract->deliveryList, $contract->delivery, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->return;?></th>
            <td><?php echo html::select('return', $lang->contract->returnList, $contract->return, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->status;?></th>
            <td><?php echo html::select('status', $lang->contract->statusList, $contract->status, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->contact;?></th>
            <td><?php echo html::select('contact', $contacts, $contract->contact, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->begin;?></th>
            <td><?php echo html::input('begin', formatTime($contract->begin), "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->end;?></th>
            <td><?php echo html::input('end', formatTime($contract->end), "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->handlers;?></th>
            <td><?php echo html::select('handlers[]', $users, $contract->handlers, "class='form-control chosen' multiple");?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->contract->lifetime;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-form table-data' id='contractLife'>
          <tr>
            <th class='w-70px'><?php echo $lang->contract->createdBy;?></th>
            <td><?php echo zget($users, $contract->createdBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->signedBy;?></th>
            <td><?php echo html::select('signedBy', $users, $contract->signedBy, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->signedDate;?></th>
            <td><?php echo html::input('signedDate', formatTime($contract->signedDate), "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->deliveredBy;?></th>
            <td><?php echo html::select('deliveredBy', $users, $contract->deliveredBy, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->deliveredDate;?></th>
            <td><?php echo html::input('deliveredDate', formatTime($contract->deliveredDate), "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->returnedBy;?></th>
            <td><?php echo html::select('returnedBy', $users, $contract->returnedBy, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->returnedDate;?></th>
            <td><?php echo html::input('returnedDate', formatTime($contract->returnedDate), "class='form-control form-date'");?></td>
          </tr>
          <?php if($contract->finishedBy):?>
          <tr>
            <th><?php echo $lang->contract->finishedBy;?></th>
            <td><?php echo html::select('finishedBy', $users, $contract->finishedBy, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->finishedDate;?></th>
            <td><?php echo html::input('finishedDate', formatTime($contract->finishedDate), "class='form-control form-date'");?></td>
          </tr>
          <?php endif;?>
          <?php if($contract->canceledBy):?>
          <tr>
            <th><?php echo $lang->contract->canceledBy;?></th>
            <td><?php echo html::select('canceledBy', $users, $contract->canceledBy, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contract->canceledDate;?></th>
            <td><?php echo html::input('canceledDate', formatTime($contract->canceledDate), "class='form-control form-date'");?></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div>
  </div>
</form>
<table id='orderGroup' class='hide'>
  <tr>
    <th></th>
    <td colspan='2'>
      <div class='form-group'>
        <span class='col-sm-8'>
          <select name='order[]' class='select-order form-control'>
            <?php foreach($orders as $order):?>
            <?php if(!$order):?>
            <option value='' data-real=''></option>
            <?php else:?>
            <option value="<?php echo $order->id;?>" data-real="<?php echo $order->plan;?>"><?php echo $order->title;?></option>
            <?php endif;?>
            <?php endforeach;?>
          </select>
        </span>
        <span class='col-sm-3'><?php echo html::input('real[]', '', "class='order-real form-control' placeholder='{$this->lang->contract->placeholder->real}'");?></span>
        <span class='col-sm-1'><?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus'") . html::a('javascript:;', "<i class='icon-minus'></i>", "class='minus'");?></span>
      </div>
    </td>
  </tr>
</table>
<?php include '../../common/view/footer.html.php';?>
