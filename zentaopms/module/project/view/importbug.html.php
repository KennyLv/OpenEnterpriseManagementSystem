<?php
/**
 * The import view file of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Yangyang Shi <shiyangyang@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/colorize.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<script language='Javascript'>
$(function(){
     $(".preview").modalTrigger({width:1000, type:'iframe'});
})
var browseType = '<?php echo $browseType;?>';
</script>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['task']);?></span>
    <strong><small class='text-muted'><?php echo html::icon($lang->icons['import']);?></small> <?php echo $lang->project->importBug;?></strong>
  </div>
  <div id='querybox' class='show'></div>
</div>
<form class='form-condensed' method='post' enctype='multipart/form-data' target='hiddenwin'>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr class='colhead'>
        <th class='w-id'>       <?php echo $lang->idAB;?></th>
        <th class='w-severity'> <?php echo $lang->bug->severityAB;?></th>
        <th class='w-pri'>      <?php echo $lang->priAB;?></th>
        <th><?php echo $lang->bug->title;?></th>
        <th class='w-80px'><?php echo $lang->bug->statusAB;?></th>
        <th class='w-80px'><?php echo $lang->task->pri;?></th>
        <th class='w-150px'><?php echo $lang->task->assignedTo;?></th>
        <th class='w-80px nobr {sorter:false}'><?php echo $lang->task->estimate;?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($bugs as $bug):?>
    <tr class='text-center'>
      <td>
        <?php echo html::checkbox("import[$bug->id]", '');?> 
        <?php echo sprintf('%03d', $bug->id) . html::hidden("id[$bug->id]", $bug->id);?>
      </td>
      <td><span class='<?php echo 'severity' . $lang->bug->severityList[$bug->severity]?>'><?php echo $lang->bug->severityList[$bug->severity]?></span></td>
      <td><span class='<?php echo 'pri' . $lang->bug->priList[$bug->pri]?>'><?php echo $lang->bug->priList[$bug->pri]?></span></td>
      <td class='text-left nobr'><?php common::printLink('bug', 'view', "bugID=$bug->id", $bug->title, '', "class='preview'", true, true);?></td>
      <td><?php echo $lang->bug->statusList[$bug->status];?></td>
      <td><?php echo html::select("pri[$bug->id]", $lang->task->priList, 3, "class='input-sm form-control'");?></td>
      <td><?php echo html::select("assignedTo[$bug->id]", $users, zget($users, $bug->assignedTo, '', $bug->assignedTo), "class='input-sm form-control'");?></td>
      <td><?php echo html::input("estimate[$bug->id]", '', 'size=4 class="input-sm form-control"');?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='8'>
          <div class='table-actions clearfix'><?php echo "<div class='btn-group'>" . html::selectButton() . '</div>' . html::submitButton($lang->import) . html::backButton();?>
          </div>
          <?php $pager->show();?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<?php include '../../common/view/footer.html.php';?>
