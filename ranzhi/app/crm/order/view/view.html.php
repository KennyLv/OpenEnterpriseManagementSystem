<?php 
/**
 * The view file for the method of view of order module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php'; ?>
<div class='col-lg-8'>
  <?php echo $this->fetch('action', 'history', "objectType=order&objectID={$order->id}");?>
  <div class='page-actions'>
    <?php
    echo "<div class='btn-group'>";
    echo html::a($this->createLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}"), $lang->order->record, "class='btn' data-toggle='modal'");
    if($order->status == 'normal') echo html::a(helper::createLink('contract', 'create', "customer={$order->customer}&orderID={$order->id}"), $this->lang->order->sign, "class='btn btn-default'");
    if($order->status != 'normal') echo html::a('###', $this->lang->order->sign, "class='btn' disabled='disabled' class='disabled'");
    if($order->status != 'closed')  echo html::a(inlink('assign', "orderID=$order->id"), $this->lang->assign, "data-toggle='modal' class='btn btn-default'");
    if($order->status == 'closed')  echo html::a('###', $this->lang->assign, "data-toggle='modal' class='btn btn-default disabled' disabled");
    echo '</div>';

    echo "<div class='btn-group'>";
    if($order->status != 'closed') echo html::a(inlink('close', "orderID=$order->id"), $this->lang->close, "class='btn btn-default' data-toggle='modal'");
    if($order->closedReason == 'payed') echo html::a('###', $this->lang->close, "disabled='disabled' class='disabled btn'");
    if($order->closedReason != 'payed' and $order->status == 'closed') echo html::a(inlink('activate', "orderID=$order->id"), $this->lang->activate, "class='btn' data-toggle='modal'");
    if($order->closedReason == 'payed' or  $order->status != 'closed') echo html::a('###', $this->lang->activate, "class='btn disabled' data-toggle='modal'");
    echo '</div>';

    echo "<div class='btn-group'>";
    echo html::a(inlink('edit',     "orderID=$order->id"), $this->lang->edit,   "class='btn btn-default'");
    echo '</div>';

    echo html::backButton();
    ?>
  </div>
</div>
<div class='col-lg-4'>
  <div class='panel'>
    <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->order->basicInfo;?></strong></div>
    <div class='panel-body'>
      <?php $payed = $order->status == 'payed';?>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->order->customer;?></th>
          <td><?php echo $customer->name . $lang->customer->levelList[$customer->level];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->product;?></th>
          <td><?php echo $product->name;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->plan;?></th>
          <td><?php echo $order->plan;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->real;?></th>
          <td><?php echo $order->real;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->assignedTo;?></th>
          <td><?php echo zget($users, $order->assignedTo);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->status;?></th>
          <td><?php echo $lang->order->statusList[$order->status];?></td>
        </tr>
        <?php if($order->status == 'signed' and $contract):?>
        <tr>
          <th><?php echo $lang->contract->common;?></th>
          <td>
            <?php echo html::a($this->createLink('contract', 'view', "contractID={$contract->id}"), $contract->name);?>
          </td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div> 
  <?php echo $this->fetch('contact', 'block', "customer={$order->customer}");?>
  <div class='panel'>
    <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->order->lifetime;?></strong></div>
    <div class='panel-body'>
      <?php $payed = $order->status == 'payed';?>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->lifetime->createdBy;?></th>
          <td><?php echo zget($users, $order->createdBy) . $lang->at . $order->createdDate;?></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->lifetime->assignedTo;?></th>
          <td><?php if($order->assignedTo) echo zget($users, $order->assignedTo) . $lang->at . $order->assignedDate;?></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->lifetime->closedBy;?></th>
          <td><?php if($order->closedBy) echo zget($users, $order->closedBy) . $lang->at . $order->closedDate;;?></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->lifetime->closedReason;?></th>
          <td><?php echo $lang->order->closedReasonList[$order->closedReason];?></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->lifetime->signedBy;?></th>
          <td>
            <?php if($contract and $contract->signedBy) echo zget($users, $contract->signedBy) . $lang->at . $contract->signedDate;?>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
