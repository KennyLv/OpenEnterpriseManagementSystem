<?php
/**
 * The create view of entry module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: create.html.php 8666 2014-05-02 07:08:41Z daitingting $
 * @link        http://www.ranzhi.org
 */
include '../../common/view/header.admin.html.php';
?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-building'></i> <?php echo $lang->entry->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' class='form form-horizontal' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->entry->name;?></th>
          <td class='w-p60'><?php echo html::input('name', '', "class='form-control' placeholder='{$lang->entry->note->name}'");?></td>
          <td><?php echo "<input type='checkbox' name='visible' value='1'>{$lang->entry->note->visible}";?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->code;?></th>
          <td><?php echo html::input('code', '', "class='form-control' placeholder='{$lang->entry->note->code}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->open;?></th>
          <td><?php echo html::select('open', $lang->entry->openList, '', 'class="form-control"');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->key;?></th>
          <td><?php echo html::input('key', $key, "class='form-control' readonly='readonly'");?></td>
          <td><span class="help-inline"><?php echo html::a('javascript:void(0)', $lang->entry->createKey, 'onclick="createKey()"')?></span></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->login;?></th>
          <td><?php echo html::input('login', '', "class='form-control' placeholder='{$lang->entry->note->login}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->logout;?></th>
          <td><?php echo html::input('logout', '', "class='form-control' placeholder='{$lang->entry->note->logout}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->block;?></th>
          <td><?php echo html::input('block', '', "class='form-control' placeholder='{$lang->entry->note->api}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->ip;?></th>
          <td><?php echo html::input('ip', '', "class='form-control' placeholder='{$lang->entry->note->ip}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->control;?></th>
          <td><?php echo html::select('control', $lang->entry->controlList, 'simple', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->size;?></th>
          <td><?php echo html::select('size', $lang->entry->sizeList, '', "class='form-control'");?></td>
          <td id='custom'>
            <?php
            echo $lang->entry->width;
            echo html::input('width', '700', "class='form-control' style='display:inline-block;width:80px;'");
            echo $lang->entry->height;
            echo html::input('height', '538', "class='form-control' style='display:inline-block;width:80px;'");
            ?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->position;?></th>
          <td><?php echo html::select('position', $lang->entry->positionList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->logo;?></th>
          <td><?php echo html::file('files', "class='form-control'");?></td>
        </tr>
        <tr>
          <td></td><td><?php echo html::submitButton() . html::backButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
