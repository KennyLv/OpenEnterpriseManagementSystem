<?php
/**
 * The admin view of entry module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: admin.html.php 8277 2014-04-15 08:09:51Z guanxiying $
 * @link        http://www.ranzhi.org
 */
include '../../common/view/header.admin.html.php';
?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-building'></i> <?php echo $lang->entry->admin;?></strong>
    <span class='pull-right'><?php echo html::a($this->inlink('create'), $lang->entry->create);?></span>
  </div>
  <table class='table table-bordered table-hover table-striped'>
    <thead>
      <tr class='text-center'>
        <th class='w-100px'><?php echo $lang->entry->name;?></th>
        <th class='w-80px'><?php echo $lang->entry->code;?></th>
        <th class='w-300px'><?php echo $lang->entry->key;?></th>
        <th><?php echo $lang->entry->ip;?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($entries as $entry):?>
      <tr class='text-left'>
        <td><?php echo "<img src='$entry->logo' class='small-icon'>" . $entry->name?></td>
        <td><?php echo $entry->code?></td>
        <td><?php echo $entry->key?></td>
        <td class='text-center'><?php echo $entry->ip?></td>
        <td class='text-center'>
          <?php
          echo html::a($this->createLink('entry', 'edit',   "code=$entry->code"), $lang->edit);
          echo html::a($this->createLink('entry', 'delete', "code=$entry->code"), $lang->delete, 'class="deleter"');
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <?php if(empty($entries)):?>
    <tfoot>
      <tr><td colspan="5"><div style="float:right; clear:none;" class="page"><?php echo $lang->entry->nothing?></div></td></tr>
    </tfoot>
    <?php endif;?>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
