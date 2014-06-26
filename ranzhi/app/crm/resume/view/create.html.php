<?php
/**
 * The view file of create function of resume module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     resume
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form id='resumeForm' method='post' action='<?php echo inlink('create', "contactID=$contactID")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->resume->customer;?></th>
      <td><?php echo html::select('customer', $customers, '', "class='form-control chosen'")?></td>
      <td>
        <input type='checkbox' id='newCustomer' name='newCustomer' value='1' />
        <label for='newCustomer'><?php echo $lang->contact->newCustomer?></label>
      </td>
    </tr>
    <tr class='customerInfo hidden'>
      <th><?php echo $lang->customer->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control'");?></td>
    </tr>
    <tr class='customerInfo hidden'>
      <th><?php echo $lang->customer->type;?></th>
      <td><?php echo html::select('type', $lang->customer->typeList, '', "class='form-control'");?></td>
    </tr>
    <tr class='customerInfo hidden'>
      <th><?php echo $lang->customer->size;?></th>
      <td><?php echo html::select('size', $lang->customer->sizeList, '', "class='form-control'");?></td>
    </tr>
    <tr class='customerInfo hidden'>
      <th><?php echo $lang->customer->status;?></th>
      <td><?php echo html::select('status', $lang->customer->statusList, '', "class='form-control'");?></td>
    </tr>
    <tr class='customerInfo hidden'>
      <th><?php echo $lang->customer->level;?></th>
      <td><?php echo html::select('level', $lang->customer->levelList, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->resume->maker?></th>
      <td><input type='checkbox' name='maker' id='maker' value='1' /></td>
    </tr>
    <tr>
      <th><?php echo $lang->resume->dept;?></th>
      <td><?php echo html::input('dept', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->resume->title;?></th>
      <td><?php echo html::input('title', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->resume->join;?></th>
      <td><?php echo html::input('join', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->resume->left;?></th>
      <td><?php echo html::input('left', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton() . html::commonButton($lang->goback, 'reloadModal btn');?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
