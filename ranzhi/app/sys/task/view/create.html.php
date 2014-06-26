<?php
/**
 * The create view file of task module of RanZhi.
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
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><?php echo $lang->task->create;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-condensed col-md-10 col-lg-8'>
        <table class='table table-form'>
          <tr>
            <th><?php echo $lang->task->project;?></th>
            <td><?php echo html::select('project', $projects, $projectID, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th class='w-80px'><?php echo $lang->task->assignedTo;?></th>
            <td class='w-p30'><?php echo html::select('assignedTo', $users, '', "class='form-control chosen'");?></td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->type;?></th>
            <td><?php echo html::select('type', $lang->task->typeList, '', "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->name;?></th>
            <td colspan='2'><?php echo html::input('name', '', "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->desc;?></th>
            <td colspan='2'><?php echo html::textarea('desc', '', "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->pri;?></th>
            <td><?php echo html::select('pri', $lang->task->priList, 0, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->estimate;?></th>
            <td>
              <div class="input-group">
                <?php echo html::input('estimate', '', "class='form-control'");?>
                <span class="input-group-addon"><?php echo $lang->task->hour;?></span>
              </div>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->task->estStarted;?></th>
            <td><?php echo html::input('estStarted', '', "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->task->deadline;?></th>
            <td><?php echo html::input('deadline', '', "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->files;?></th>
            <td colspan='2'><?php echo $this->fetch('file', 'buildForm');?></td>
          </tr>
          <tr><th></th><td><?php echo html::submitButton() . html::backButton();?></td></tr>
        </table>
    </form>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
