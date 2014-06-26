<?php
/**
 * The edit view of entry module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: edit.html.php 8649 2014-05-02 05:46:40Z guanxiying $
 * @link        http://www.ranzhi.org
 */
include '../../common/view/header.admin.html.php';
?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-edit'></i> <?php echo $lang->entry->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' class='form form-horizontal' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->entry->name;?></th>
          <td class='w-p60'><?php echo html::input('name', $entry->name, "class='form-control'");?></td>
          <td>
            <?php
            $checked = $entry->visible ? 'checked="checked"' : ''; 
            echo "<input type='checkbox' name='visible' value='1' $checked>{$lang->entry->note->visible}";
            ?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->code;?></th>
          <td><?php echo $entry->code;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->open;?></th>
          <td><?php echo html::select('open', $lang->entry->openList, $entry->open,'class="form-control"');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->key;?></th>
          <td><?php echo html::input('key', $entry->key, "class='form-control' readonly='readonly'");?></td>
          <td><?php echo html::a('javascript:void(0)', $lang->entry->createKey, 'onclick="createKey()"')?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->login;?></th>
          <td><?php echo html::input('login', $entry->login, "class='form-control' placeholder='{$lang->entry->note->login}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->logout;?></th>
          <td><?php echo html::input('logout', $entry->logout, "class='form-control' placeholder='{$lang->entry->note->logout}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->block;?></th>
          <td><?php echo html::input('block', $entry->block, "class='form-control' placeholder='{$lang->entry->note->api}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->ip;?></th>
          <td><?php echo html::input('ip', $entry->ip, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->control;?></th>
          <td><?php echo html::select('control', $lang->entry->controlList, $entry->control, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->size;?></th>
          <td><?php echo html::select('size', $lang->entry->sizeList, $entry->size, "class='form-control'");?></td>
          <td id='custom'>
            <?php
            echo $lang->entry->width;
            echo html::input('width', isset($entry->width) ? $entry->width : '700', "class='form-control' style='display:inline-block;width:80px;'");
            echo $lang->entry->height;
            echo html::input('height', isset($entry->height) ? $entry->height : '538', "class='form-control' style='display:inline-block;width:80px;'");
            ?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->position;?></th>
          <td><?php echo html::select('position', $lang->entry->positionList, $entry->position, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->entry->logo;?></th>
          <td><?php echo html::file('files');?></td>
        </tr>
        <tr>
          <td></td><td><?php echo html::submitButton() . html::backButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
