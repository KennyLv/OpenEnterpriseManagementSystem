<?php
/**
 * The edit view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user 
 * @version     $Id: edit.html.php 8673 2014-05-02 08:27:20Z sunhao $
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . '../sys/common/view/header.modal.html.php'; ?>
<form method='post' id='editForm' action="<?php echo inlink('edit', "account={$user->account}");?>" class='form-condensed'>
  <fieldset>
    <legend><?php echo $lang->user->basicInfo; ?></legend>
    <table class='table table-form'>
      <tr>
        <th class='w-50px text-left'><?php echo $lang->user->account;?></th>
        <td><?php echo html::input('account', $user->account, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->realname;?></th>
        <td><?php echo html::input('realname', $user->realname, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->gender;?></th>
        <td><?php unset($lang->user->genderList->u); echo html::radio('gender', $lang->user->genderList, $user->gender);?></td>
      </tr>  
      <tr>
        <th class='w-80px'><?php echo $lang->user->dept;?></th>
        <td class='w-p40'><?php echo html::select('dept', $depts, $user->dept, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->role;?></th>
        <td><?php echo html::select('role', $lang->user->roleList, $user->role, "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->password;?></th>
        <td><?php echo html::password('password1', '', "class='form-control' autocomplete='off'")?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->user->password2;?></th>
        <td><?php echo html::password('password2', '', "class='form-control'");?></td><td></td>
      </tr>  
    </table>
  </fieldset>
  <fieldset>
    <legend><?php echo $lang->user->contactInfo; ?></legend>
    <table class='table table-form'>
      <tr>
        <th class='w-80px'><?php echo $lang->user->email;?></th>
        <td><?php echo html::input('email', $user->email, "class='form-control'");?></td>
        <th><?php echo $lang->user->zipcode;?></th>
        <td><?php echo html::input('zipcode', $user->zipcode, "class='form-control'");?></td>
      </tr>
      <tr>
        <th class='w-80px'><?php echo $lang->user->mobile;?></th>
        <td><?php echo html::input('mobile', $user->mobile, "class='form-control'");?></td>
        <th><?php echo $lang->user->phone;?></th>
        <td><?php echo html::input('phone', $user->phone, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->qq;?></th>
        <td><?php echo html::input('qq', $user->qq, "class='form-control'");?></td>
        <th><?php echo $lang->user->gtalk;?></th>
        <td><?php echo html::input('gtalk', $user->gtalk, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->user->address;?></th>
        <td colspan='3'><?php echo html::input('address', $user->address, "class='form-control'");?></td>
      </tr>
    </table>
  </fieldset>
  <div class='text-center'>
    <?php echo html::submitButton();?>
  </div>
</form>
<?php include $app->getModuleRoot() . '../sys/common/view/footer.modal.html.php'; ?>

