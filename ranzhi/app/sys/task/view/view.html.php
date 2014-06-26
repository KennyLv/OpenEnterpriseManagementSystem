<?php
/**
 * The view view file of task module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<div class='col-md-8'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $task->name;?></strong></div>
    <div class='panel-body'>
      <?php echo $task->desc;?>
      <div><?php echo $this->fetch('file', 'printFiles', array('files' =>$task->files, 'fieldset' => 'false'))?></div>
    </div>
  </div>
  <?php echo $this->fetch('action', 'history', "objectType=task&objectID={$task->id}");?>
  <div class='text-center'>
    <?php
    echo $this->task->buildOperateMenu($task, 'btn', 'view');
    echo html::backButton();
    ?>
  </div>
</div>
<div class='col-md-4'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->task->basicInfo?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->task->project;?></th>
          <td><?php echo $projects[$task->project];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->assignedTo;?></th>
          <td><?php echo $users[$task->assignedTo];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->type;?></th>
          <td><?php echo $lang->task->typeList[$task->type];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->status;?></th>
          <td><?php echo $lang->task->statusList[$task->status];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->pri;?></th>
          <td><?php echo $lang->task->priList[$task->pri];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->deadline;?></th>
          <td><?php echo formatTime($task->deadline);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->estimate;?></th>
          <td><?php echo $task->estimate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->consumed;?></th>
          <td><?php echo $task->consumed;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->left;?></th>
          <td><?php echo $task->left;?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->task->life?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->task->createdBy;?></th>
          <td><?php echo zget($users, $task->createdBy, $task->createdBy) . $lang->at . $task->createdDate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->finishedBy;?></th>
          <td><?php if($task->finishedBy) echo zget($users, $task->finishedBy, $task->finishedBy) . $lang->at . $task->finishedDate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->canceledBy;?></th>
          <td><?php if($task->canceledBy) echo zget($users, $task->canceledBy, $task->canceledBy) . $lang->at . $task->canceledDate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->closedBy;?></th>
          <td><?php if($task->closedBy) echo zget($users, $task->closedBy, $task->closedBy) . $lang->at . $task->closedDate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->closedReason;?></th>
          <td><?php echo $lang->task->reasonList[$task->closedReason];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->lastEditedBy;?></th>
          <td><?php if($task->editedBy) echo zget($users, $task->editedBy, $task->editedBy) . $lang->at . $task->editedDate;?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
