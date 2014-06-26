<?php
/**
 * The save order record view file of order module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('customer', $customer);?>
<form method='post' id='createRecordForm' action='<?php echo inlink('createrecord', "objectType={$objectType}&objectID={$objectID}")?>' class='form-inline'>
  <table class='table table-form'>
    <?php if($objectType != 'contact'):?>
    <tr>
      <th><?php echo $lang->action->record->contact;?></th>
      <td>
        <div class='col-sm-8'><?php echo html::select('contact', $contacts, '', "class='form-control'");?></div>
        <?php if($objectType == 'customer'):?>
        <div class='col-sm-4'>
        <?php echo html::checkbox('objectType', array('order' =>$lang->action->record->order, 'contract' => $lang->action->record->contract), '', "class='checkbox-inline'");?>
        </div>
        <?php endif;?>
      </td>
    </tr>
    <?php elseif($objectType != 'customer'):?>
    <tr>
      <th><?php echo $lang->action->record->customer;?></th>
      <td>
        <div class='col-sm-8'>
          <?php echo html::hidden('contact', $objectID);?>
          <?php echo html::select('customer', $customers, '', "class='form-control'");?>
        </div>
      </td>
    </tr>
    <?php endif;?>
    <?php if($objectType == 'customer'):?>
    <tr style='display:none'>
      <th><?php echo $lang->action->record->contract;?></th>
      <td>
        <div class='col-sm-8'>
          <?php echo html::select('contract', $contracts, '', "class='form-control chosen'");?>
        </div>
      </td>
    </tr>
    <tr style='display:none'>
      <th><?php echo $lang->action->record->order;?></th>
      <td>
        <div class='col-sm-8'>
          <?php echo html::select('order', $orders, '', "class='form-control'");?>
        </div>
      </td>
    </tr>
    <?php endif;?>
    <tr>
      <th class='w-100px'><?php echo $lang->action->record->date;?></th>
      <td><div class='col-sm-8'><?php echo html::input('date', date('Y-m-d H:i:s'), "class='form-control form-datetime'");?></div></td>
    </tr> 
    <tr>
      <th><?php echo $lang->action->record->comment;?></th>
      <td><div class='col-sm-12'><?php echo html::textarea('comment', '', "class='form-control' rows='3'");?></div></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <div class='col-sm-12'>
          <?php echo html::submitButton() . html::hidden('customer', $customer);?>
        </div>
      </td>
    </tr>
  </table>
  <?php echo $this->fetch('action', 'history', "objectType={$objectType}&objectID={$objectID}&action=record");?>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
