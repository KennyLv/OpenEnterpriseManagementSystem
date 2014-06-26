<?php
/**
 * The batch create view of task module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <Yidong@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form id='ajaxForm' method='post'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->task->batchCreate;?></strong></div>
    <table class='table table-form'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->task->id;?></th> 
          <th><?php echo $lang->task->name;?> <span class='required'></span></th>
          <th class='w-90px'><?php echo $lang->task->assignedTo;?></th>
          <th class='w-p25'><?php echo $lang->task->desc;?></th>
          <th class='w-120px'><?php echo $lang->task->deadline;?></th>
          <th class='w-70px'><?php echo $lang->task->pri;?></th>
          <th class='w-70px'><?php echo $lang->task->estimateAB;?></th>
        </tr>
      </thead>

      <?php
      $users['ditto'] = $lang->task->ditto;
      ?>
      <?php for($i = 0; $i < $config->task->batchCreate; $i++):?>
      <?php 
      $member = $i == 0 ? '' : 'ditto';
      $pri = 3;
      ?>
      <tr>
        <td class='text-center'><?php echo $i+1;?></td>
        <td><?php echo html::input("name[$i]", '', "class='form-control'");?></td>
        <td><?php echo html::select("assignedTo[$i]", $users, $member, "class='form-control'");?></td>
        <td><?php echo html::textarea("desc[$i]", '', "rows='1' class='form-control'");?></td>
        <td><?php echo html::input("deadline[$i]", '', "class='form-control form-date'");?></td>
        <td><?php echo html::select("pri[$i]", $lang->task->priList, $pri, "class=form-control");?></td>
        <td><?php echo html::input("estimate[$i]", '', "class='form-control text-center' placeholder='{$lang->task->hour}'");?></td>
      </tr>
      <?php endfor;?>
      <tr><td colspan='7' class='text-center'><?php echo html::submitButton() . html::backButton();?></td></tr>
    </table>
  </div>
</form>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
