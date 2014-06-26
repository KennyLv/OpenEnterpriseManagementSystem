<?php
/**
 * The edit view file of project module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     project 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('edit', "projectID={$project->id}")?>'>
  <div class='form-group'>
    <label for="name"><?php echo $lang->project->name;?></label>
    <?php echo html::input('name', $project->name, "class='form-control'");?>
  </div>
  <?php echo html::submitButton();?>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
