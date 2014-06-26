<?php
/**
 * The assignTo view file of task module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo $this->createLink('task', 'assignTo', "taskID=$taskID")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->task->assignedTo;?></th>
      <td><?php echo html::select('assignedTo', $users, '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->task->left;?></th>
      <td><?php echo html::input('left', $task->left, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->comment?></th>
      <td><?php echo html::textarea('comment');?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
