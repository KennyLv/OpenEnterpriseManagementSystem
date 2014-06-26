<?php
/**
 * The view file of task module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-list-ul"></i> <?php echo $lang->task->list;?></strong>
    <div class='panel-actions pull-right'><?php echo html::a($this->createLink('task', 'create', "projectID=$projectID"), '<i class="icon-plus"></i> ' . $lang->task->create, 'class="btn btn-primary"');?></div>
  </div>
  <table class='table table-hover table-striped tablesorter table-data'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-60px'> <?php commonModel::printOrderLink('id',          $orderBy, $vars, $lang->task->id);?></th>
        <th class='w-40px'> <?php commonModel::printOrderLink('pri',         $orderBy, $vars, $lang->task->lblPri);?></th>
        <th>                <?php commonModel::printOrderLink('name',        $orderBy, $vars, $lang->task->name);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('deadline',    $orderBy, $vars, $lang->task->deadline);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('assignedTo',  $orderBy, $vars, $lang->task->assignedTo);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->task->createdDate);?></th>
        <th class='w-90px'> <?php commonModel::printOrderLink('type',        $orderBy, $vars, $lang->task->type);?></th>
        <th class='w-90px'> <?php commonModel::printOrderLink('status',      $orderBy, $vars, $lang->task->status);?></th>
        <th class='w-90px'> <?php commonModel::printOrderLink('order',       $orderBy, $vars, $lang->task->order);?></th>
        <th class='w-120px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tasks as $task):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('task', 'view', "taskID=$task->id"); ?>'>
        <td><?php echo $task->id;?></td>
        <td><span class='active pri pri-<?php echo $task->pri; ?>'><?php echo $lang->task->priList[$task->pri];?></span></td>
        <td class='text-left'><?php echo $task->name;?></td>
        <td><?php echo $task->deadline;?></td>
        <td><?php echo $task->assignedTo;?></td>
        <td><?php echo $task->createdDate;?></td>
        <td><?php echo $lang->task->typeList[$task->type];?></td>
        <td><?php echo $lang->task->statusList[$task->status];?></td>
        <td><?php echo $task->order;?></td>
        <td>
          <?php
          echo html::a($this->createLink('task', 'edit', "taskID=$task->id"), $lang->edit);
          echo html::a($this->createLink('task', 'assignto', "taskID=$task->id"), $lang->assign, "data-toggle='modal'");
          if($task->status != 'done')
          {
              echo html::a($this->createLink('task', 'finish', "taskID=$task->id"), $lang->finish, "data-toggle='modal'");
          }
          else
          {
              echo $lang->finish;
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php js::set('projectID', $projectID)?>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
