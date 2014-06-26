<?php 
/**
 * The browse view file of trade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-group"></i> <?php echo $lang->trade->browse;?></strong>
    <div class="panel-actions pull-right">
      <?php echo html::a(inlink('create', 'type=in'),  "{$lang->trade->in}</i>", "class='btn btn-primary'")?>
      <?php echo html::a(inlink('create', 'type=out'), "{$lang->trade->out}</i>", "class='btn btn-primary'")?>
      <?php echo html::a(inlink('transfer'), "{$lang->trade->transfer}</i>", "class='btn btn-primary'")?>
      <?php //echo html::a(inlink('batchcreate'), "{$lang->trade->batchCreate}</i>", "class='btn btn-primary'")?>
    </div>
  </div>
  <table class='table table-hover table-striped tablesorter table-data' id='tradeList'>
    <thead>
      <tr class='text-center'>
        <th class='w-70px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->trade->id);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('depositor', $orderBy, $vars, $lang->trade->depositor);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->trade->type);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->trade->trader);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->trade->money);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('currency', $orderBy, $vars, $lang->trade->currency);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->trade->category);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('handlers', $orderBy, $vars, $lang->trade->handlers);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('date', $orderBy, $vars, $lang->trade->date);?></th>
        <th><?php commonModel::printOrderLink('desc', $orderBy, $vars, $lang->trade->desc);?></th>
        <th class='w-120px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($trades as $trade):?>
      <tr class='text-center'>
        <td class='text-right'><?php echo $trade->id;?></td>
        <td><?php echo $depositorList[$trade->depositor];?></td>
        <td><?php echo $lang->trade->typeList[$trade->type];?></td>
        <td><?php echo zget($customerList, $trade->trader);?></td>
        <td><?php echo $trade->money;?></td>
        <td><?php echo zget($lang->depositor->currencyList, $trade->currency);?></td>
        <td><?php echo zget($categories, $trade->category);?></td>
        <td><?php echo zget($users, $trade->handlers);?></td>
        <td><?php echo formatTime($trade->date, 'Y-m-d');?></td>
        <td class='text-left'><?php echo $trade->desc;?></td>
        <td>
          <?php echo html::a(inlink('edit', "tradeID={$trade->id}"), $lang->edit);?>
          <?php echo html::a(inlink('detail', "tradeID={$trade->id}"), $lang->trade->detail, "data-toggle='modal'");?>
          <?php echo html::a(inlink('delete', "tradeID={$trade->id}"), $lang->delete, "class='deleter'");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='11'><?php echo $pager->get();?></td></tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
