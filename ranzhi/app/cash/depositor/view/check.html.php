<?php 
/**
 * The check view file of depositor module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-group"></i> <?php echo $lang->depositor->check;?></strong>
  </div>
  <div class='panel-body'> 
    <form method='post' id='ajax-form' class='form-inline'>
      <table class="table table-form w-p100">
        <tr>
          <th class='w-60px'><?php echo $lang->depositor->common;?></th>
          <td><?php echo html::select('depositor[]', array('all' => $lang->depositor->all) + $depositorList, empty($selected) ? 'all' : $selected, "class='form-control chosen'");?></td>
          <th class='w-100px'><?php echo $lang->depositor->start;?></th>
          <td class='w-200px'><?php echo html::select('start', $dateOptions, $start, "class='form-control'");?></td>
          <th class='w-100px'><?php echo $lang->depositor->end;?></th>
          <td class='w-200px'><?php echo html::select('end', $dateOptions, $end, "class='form-control'");?></td>
          <td class='w-80px'><?php echo html::submitButton($lang->depositor->check);?></td>
        </tr>
      </table>
    </form>
    <?php if(!empty($results)):?>
    <div>
      <table class='table table-hover table-striped tablesorter table-data'>
        <thead>
          <tr>
            <th><?php echo $lang->depositor->common;?></th>
            <th><?php echo $lang->depositor->currency;?></th>
            <th><?php echo $lang->depositor->originValue;?></th>
            <th><?php echo $lang->depositor->computedValue;?></th>
            <th><?php echo $lang->depositor->actualValue;?></th>
            <th><?php echo $lang->depositor->result;?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $depositorID => $result):?>
          <?php $class = $result->computed == $result->actual ? '' : 'text-error';?>
          <?php $diff  = $result->computed - $result->actual;?>
          <tr class='<?php echo $class;?>'>
            <td><?php echo zget($depositorList, $depositorID); ?></td>
            <td><?php echo zget($lang->depositor->currencyList, $result->currency); ?></td>
            <td><?php echo $result->origin;?></td>
            <td><?php echo $result->computed;?></td>
            <td><?php echo $result->actual;?></td>
            <?php if($diff == 0):?>
            <td><?php echo $lang->depositor->success;?></td>
            <?php endif;?>
            <?php if($diff > 0):?>
            <td><?php printf($lang->depositor->more, $diff);?></td>
            <?php endif;?>
           <?php if($diff < 0):?>
            <td><?php printf($lang->depositor->less, $diff);?></td>
            <?php endif;?>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <?php endif;?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
