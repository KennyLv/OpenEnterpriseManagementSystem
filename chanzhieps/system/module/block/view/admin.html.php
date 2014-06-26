<?php
/**
 * The browse view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-th'></i> <?php echo $lang->block->browseBlocks;?></strong>
    <div class='panel-actions'>
      <?php echo html::a(inlink('create'), '<i class="icon-plus"></i> ' . $lang->block->create, 'class="btn btn-primary"');?>
    </div>
  </div>
  <table class='table table-bordered table-hover table-striped'>
    <tr class='text-center'>
      <th class='text-center w-100px'><?php echo $lang->block->id;?></th>
      <th><?php echo $lang->block->title;?></th>
      <th><?php echo $lang->block->type;?></th>
      <th class='w-200px'><?php echo $lang->actions;?></th>
    </tr>
    <?php foreach($blocks as $block):?>
    <tr class='text-center'>
      <td><?php echo $block->id;?></td>
      <td class='text-left'><?php echo $block->title;?></td>
      <td><?php echo $lang->block->typeList[$block->type];?></td>
      <td>
        <?php 
        echo html::a(inlink('edit',   "blockID=$block->id"), $lang->edit);
        echo html::a(inlink('delete', "blockID=$block->id"), $lang->delete, "class='deleter'");
        ?>
      </td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan='4'> <?php echo $pager->get(); ?> </td>
    </tr>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
