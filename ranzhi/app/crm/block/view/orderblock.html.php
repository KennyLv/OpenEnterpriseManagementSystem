<?php
/**
 * The order block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<table class='table table-data table-hover block-order table-fixed'>
  <tr>
    <th class='w-id text-center'><?php echo $lang->order->id?></th>
    <th><?php echo $lang->order->customer?></th>
    <th class='w-100px'><?php echo $lang->order->amount?></th>
    <th class='w-70px'><?php echo $lang->order->status?></th>
  </tr>
  <?php foreach($orders as $id => $order):?>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <tr data-url='<?php echo $this->createLink('order', 'view', "orderID=$id"); ?>' <?php echo $appid?>>
    <td class='text-center'><?php echo $id?></td>
    <td><?php if(isset($customers[$order->customer])) echo $customers[$order->customer]?></td>
    <td><?php echo $order->real == '0.00' ? $order->plan : $order->real;?></td>
    <td><?php echo $lang->order->statusList[$order->status]?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-order').dataTable();</script>
