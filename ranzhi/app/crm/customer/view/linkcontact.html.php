<?php
/**
 * The lssociate contact file of customer module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='linkContactForm' method='post' action='<?php echo inlink('linkContact', "customerID=$customerID")?>'>
  <table class='table table-form'>
      <tr>
        <th class='w-100px'><?php echo $lang->customer->contact;?></th>
        <td><?php echo html::select('contact', $contacts, '', "class='form-control chosen'")?> </td>
        <td class='w-120px'>
          <input type='checkbox' name='newContact' value='1' id='newContact' />
          <label for='newContact'><?php echo $lang->customer->newContact?></label>
        </td>
      </tr>
  </table>
  <div id='contactInfo' class='hidden'>
    <table class='table table-form'>
      <tr>
        <th class='w-100px'><?php echo $lang->contact->realname;?></th>
        <td><?php echo html::input('realname', '', "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->contact->gender;?></th>
        <td><?php echo html::radio('gender', $lang->contact->genderList, '');?></td>
      </tr>
      <tr>
        <th><?php echo $lang->contact->email;?></th>
        <td><?php echo html::input('email', '', "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->contact->mobile;?></th>
        <td><?php echo html::input('mobile', '', "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->contact->qq;?></th>
        <td><?php echo html::input('qq', '', "class='form-control'");?></td>
      </tr>
    </table>
  </div>
  <p class='text-center'><?php echo html::submitButton() . html::commonButton($lang->goback, 'reloadModal btn')?></p>
<form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
