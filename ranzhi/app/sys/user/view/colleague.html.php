<?php
/**
 * The colleague view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     User
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php
include $app->getModuleRoot() . 'common/view/header.html.php';
include '../../common/view/treeview.html.php';
js::set('deptID', $deptID);
?>
<div class="col-md-12">
  <div class='col-md-2'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-building"></i> <?php echo $lang->dept->common;?></strong></div>
      <div class='panel-body'><div id='treeMenuBox'><?php echo $treeMenu;?></div></div>
    </div>
  </div>
  <div class='col-md-10'>
    <div class="row">
      <div class='clearfix'>
        <div class="panel">
          <div class="panel-heading">
            <strong><i class="icon-group"></i> <?php echo $lang->user->colleague;?></strong>
            <div class="pull-right col-md-3 search">
              <form method='post' class='form-inline form-search'>
                <div class="input-group">
                  <?php echo html::input('query', $query, "class='form-control search-query' placeholder='{$lang->user->inputColleague}'"); ?>
                  <span class="input-group-btn">
                    <?php echo html::submitButton($lang->user->searchUser,"btn btn-primary"); ?>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class='panel-body'>
            <?php foreach($users as $user):?>
            <div class='col-md-4'>
              <div class='panel'>
                <table class='table table-bordered table-contact'>
                  <tr>
                    <th class='w-100px text-center alert v-middle'>
                      <span class='lead'><?php echo $user->realname;?></span>
                      <small><?php $gender = $user->gender; echo $lang->user->genderList->$gender;?></small>
                    </th>
                    <td>
                      <div class='text-right'>
                        <i class='btn-vcard icon icon-qrcode icon-large text-info'> </i>
                      </div>
                      <dl class='contact-info'>
                        <?php if($user->dept or $user->role) echo "<dd><i class='icon-group'></i> " . zget($depts, $user->dept, ' ') . zget($lang->user->roleList, $user->role) . "</dd>";?>
                        <?php if($user->phone or $user->mobile) echo "<dd><i class='icon-phone-sign'></i> $user->phone $user->mobile</dd>";?>
                        <?php if($user->qq) echo "<dd><i class='icon-qq'></i> $user->qq</dd>";?>
                        <?php if($user->email) echo "<dd><i class='icon-envelope-alt'></i> $user->email </dd>";?>
                        <?php if($user->address) echo "<dd><i class='icon-home'></i> $user->address </dd>";?>
                      </dl>
                      <p class='vcard text-center'><?php echo html::image(inlink('vcard', "user={$user->account}"), "style='height:120px'");?></p>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <?php endforeach;?>
            <?php $pager->show();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../../../team/common/view/footer.html.php'; ?>
