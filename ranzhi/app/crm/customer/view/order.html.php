<?php
/**
 * The order list file of customer module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<table class='table table-bordered table-hover table-striped table-data'>
  <thead>
    <tr class='text-center'>
      <th class='w-50px'><?php echo $lang->order->id;?></th>
      <th><?php echo $lang->order->product;?></th>
      <th><?php echo $lang->order->plan;?></th>
      <th><?php echo $lang->order->assignedTo;?></th>
      <th class='w-50px'><?php echo $lang->order->status;?></th>
      <th class='w-80px'><?php echo $lang->order->contactedDate;?></th>
      <th class='w-80px'><?php echo $lang->order->nextDate;?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $order):?>
    <tr class='text-center'>
      <td><?php echo $order->id;?></td>
      <td><?php echo $products[$order->product];?></td>
      <td><?php echo $order->plan;?></td>
      <td><?php echo $order->assignedTo;?></td>
      <td><?php echo $lang->order->statusList[$order->status];?></td>
      <td><?php echo substr($order->contactedDate, 0, 10);?></td>
      <td><?php echo substr($order->nextDate, 0, 10);?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
