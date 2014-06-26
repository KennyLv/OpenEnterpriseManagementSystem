<?php 
/**
 * The info file of customer module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='row'>
  <div class='col-md-8'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $customer->name . $lang->customer->desc;?></strong></div>
      <div class='panel-body'><?php echo $customer->desc;?></div>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->intension;?></strong></div>
      <div class='panel-body'><?php echo $customer->intension;?></div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=customer&objectID={$customer->id}")?>
    <div class='page-actions'>
      <?php
      echo "<div class='btn-group'>";
      echo html::a($this->createLink('action', 'createRecord', "objectType=customer&objectID={$customer->id}&customer={$customer->id}"), $lang->customer->record, "class='btn' data-toggle='modal'");
      echo html::a(inlink('edit', "customerID=$customer->id"), $lang->edit, "class='btn'");
      echo html::a(inlink('delete', "customerID=$customer->id"), $lang->delete, "class='deleter btn'");
      echo '</div>';
      echo "<div class='btn-group'>";
      echo html::backButton();
      echo '</div>';
      ?>
    </div>
  </div>
  <div class='col-md-4'>  
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->basicInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-70px'><?php echo $lang->customer->level;?></th>
            <td><?php echo $lang->customer->levelList[$customer->level];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->status;?></th>
            <td><?php echo $lang->customer->statusList[$customer->status];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->size;?></th>
            <td><?php echo $lang->customer->sizeList[$customer->size];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->type;?></th>
            <td><?php echo $lang->customer->typeList[$customer->type];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->industry;?></th>
            <td><?php if($customer->industry) echo $industry[$customer->industry];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->area;?></th>
            <td><?php if($customer->area) echo $area[$customer->area];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->weibo;?></th>
            <td><?php echo $customer->weibo;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->weixin;?></th>
            <td><?php echo $customer->weixin;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->customer->site;?></th>
            <td><?php echo $customer->site;?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php echo $this->fetch('contact', 'block', "customer={$customer->id}")?>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->contract;?></strong></div>
      <table class='table table-data table-condensed'>
        <thead>
          <tr class='text-left'>
            <th><?php echo $lang->contract->name;?></th>
            <th><?php echo $lang->contract->amount;?></th>
            <th><?php echo $lang->contract->status;?></th>
          </tr>
        </thead>
        <?php foreach($contracts as $contract):?>
        <tr>
          <td><?php echo $contract->name;?></td>
          <td><?php echo $contract->amount;?></td>
          <td><?php echo $lang->contract->statusList[$contract->status];?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->order;?></strong></div>
      <table class='table table-data table-condensed'>
        <thead>
          <tr class='text-left'>
            <th><?php echo $lang->order->product;?></th>
            <th><?php echo $lang->order->plan;?></th>
            <th><?php echo $lang->order->real;?></th>
            <th><?php echo $lang->order->status;?></th>
          </tr>
        </thead>
        <?php foreach($orders as $order):?>
        <tr>
          <td><?php echo $products[$order->product];?></td>
          <td><?php echo $order->plan;?></td>
          <td><?php echo $order->real;?></td>
          <td><?php echo $lang->order->statusList[$order->status];?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->customer->address;?></strong></div>
      <table class='table table-data table-condensed'>
        <?php foreach($addresses as $address):?>
        <tr>
          <td><?php echo $address->title . $lang->colon . $address->fullLocation;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
