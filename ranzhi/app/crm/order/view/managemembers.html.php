<?php 
/**
 * The managemembers view file of oder module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('userRoles', $userRoles);?>
<?php js::set('roles', array_flip($roles));?>
<div class='panel'>
  <div class='panel-heading'>
  <strong><i class="icon-list-ul"></i> <?php echo $lang->order->manageMembers;?></strong>
  </div>
  <form method='post' id='ajaxForm'>
    <table class='table table-hover table-form'>
      <thead>
        <tr class='text-center'>
          <th class='w-200px'><?php echo $lang->team->account;?></th>
          <th class='w-400px'><?php echo $lang->team->role;?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($currentMembers as $member):?>
        <?php if(!isset($users[$member->account])) continue; $realname = $users[$member->account];?>
        <tr>
          <td><?php echo html::select('account[]', $users, $member->account, "class='form-control account'");?></td>
          <td>
            <div class="input-group w-700px">
              <?php echo html::select('role[]', $roles, $member->role, "class='form-control role'");?>
              <div class='input-group-btn'>
                <i class='icon-plus-sign icon-large'></i>
                <i class='icon-minus-sign icon-large'></i>
              </div>
            </div> 
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='2'><?php echo html::submitButton();?></td></tr>
      </tfoot>
    </table>
  </form>
</div>
<table class='hide'>
  <tbody id='roleGroup'>
    <tr>
      <td><?php echo html::select('account[]', $users, '', "class='form-control account'");?></td>
      <td>
        <div class="input-group">
          <?php echo html::select('role[]', $roles, '', "class='form-control role'");?>
          <div class='input-group-btn'>
            <i class='icon-plus-sign icon-large'></i>
            <i class='icon-minus-sign icon-large'></i>
          </div>
        </div> 
      </td>
    </tr>
  </tbody>
</table>
<?php include '../../common/view/footer.html.php';?>
