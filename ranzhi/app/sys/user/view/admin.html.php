<?php
/**
 * The admin view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yangyang Shi <shiyangyangwork@yahoo.cn>
 * @package     User
 * @version     $Id: admin.html.php 8684 2014-05-03 02:27:58Z daitingting $
 * @link        http://www.ranzhi.org
 */
?>
<?php
include '../../common/view/header.admin.html.php';
include '../../common/view/treeview.html.php';
js::set('deptID', $deptID);
js::set('from', 'admin');
?>
<div class="col-md-12">
  <?php include './deptside.html.php';?>
  <div class='col-md-10'>
    <div class="row">
      <div class='clearfix'>
        <div class="panel">
          <div class="panel-heading">
            <strong><i class="icon-group"></i> <?php echo $lang->user->list;?></strong>
            <div class="pull-right col-md-3 search">
              <form method='post' class='form-inline form-search'>
                <div class="input-group">
                  <?php echo html::input('query', $query, "class='form-control search-query' placeholder='{$lang->user->inputUserName}'"); ?>
                  <span class="input-group-btn">
                    <?php echo html::submitButton($lang->user->searchUser,"btn btn-primary"); ?>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <table class='table table-hover table-striped table-bordered tablesorter'>
            <thead>
              <tr class='text-center'>
                <?php $vars = "deptID=$deptID&query=$query&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
                <th><?php commonModel::printOrderLink('id',       $orderBy, $vars, $lang->user->id);?></th>
                <th><?php commonModel::printOrderLink('realname', $orderBy, $vars, $lang->user->realname);?></th>
                <th><?php commonModel::printOrderLink('account',  $orderBy, $vars, $lang->user->account);?></th>
                <th><?php commonModel::printOrderLink('gender',   $orderBy, $vars, $lang->user->gender);?></th>
                <th><?php commonModel::printOrderLink('dept',     $orderBy, $vars, $lang->user->dept);?></th>
                <th><?php commonModel::printOrderLink('join',     $orderBy, $vars, $lang->user->join);?></th>
                <th><?php commonModel::printOrderLink('visits',   $orderBy, $vars, $lang->user->visits);?></th>
                <th><?php commonModel::printOrderLink('last',     $orderBy, $vars, $lang->user->last);?></th>
                <th><?php commonModel::printOrderLink('ip',       $orderBy, $vars, $lang->user->ip);?></th>
                <th><?php commonModel::printOrderLink('locked',   $orderBy, $vars, $lang->user->status);?></th>
                <th><?php echo $lang->actions;?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user):?>
            <tr class='text-center'>
              <td><?php echo $user->id;?></td>
              <td><?php echo $user->realname;?></td>
              <td><?php echo $user->account;?></td>
              <td><?php $gender = $user->gender; echo $lang->user->genderList->$gender;?></td>
              <td><?php echo $depts[$user->dept];?></td>
              <td><?php echo $user->join;?></td>
              <td><?php echo $user->visits;?></td>
              <td><?php echo $user->last;?></td>
              <td><?php echo $user->ip;?></td>
              <td>
                <?php
                $status = 'normal';
                if($user->fails > 4 and $user->locked > helper::now())
                {
                    $status = 'locked';
                    echo $lang->user->statusList->locked;
                }
                if($user->fails <= 4 and $user->locked > helper::now())
                {
                    $status = 'forbidden';
                    echo $lang->user->statusList->forbidden;
                }
                if($user->locked <= helper::now()) echo $lang->user->statusList->normal;
                ?>
              </td>
              <td class='operate'>
                <?php
                echo html::a($this->createLink('user', 'edit', "account=$user->account"), $lang->edit, RUN_MODE == 'front' ? "data-toggle='modal'" : '');
                if($status == 'normal')
                {
                    echo html::a($this->createLink('user', 'forbid', "userID=$user->id"), $lang->user->forbid, "class='forbider'");
                }
                else
                {
                    echo html::a($this->createLink('user', 'active', "userID=$user->id"), $lang->user->active, "class='forbider'");
                }
                echo html::a($this->createLink('user', 'delete', "account=$user->account"), $lang->delete, "class='deleter'");
                ?>
              </td>
            </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot><tr><td colspan='12'><?php $pager->show();?></td></tr></tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
