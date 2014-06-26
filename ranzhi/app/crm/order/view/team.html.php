<?php 
/**
 * The team view file of order module of RanZhi.
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
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-list-ul"></i> <?php echo $lang->order->team;?></strong>
  </div>
  <table class='table table-hover table-striped tablesorter'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->team->account;?></th>
        <th class='w-100px'><?php echo $lang->team->role;?></th>
        <th class='w-160px'><?php echo $lang->team->join;?></th>
        <th class='w-200px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($teamMembers as $member):?>
      <tr class='text-center'>
        <td><?php echo $member->realname;?></td>
        <td><?php echo $roles[$member->role];?></td>
        <td><?php echo substr($member->join,2)?></td>
        <td><?php echo html::a($this->inLink('unlinkMember', "orderID=$order->id&account=$member->account"), $lang->delete, "class='deleter'");?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
    <tr>
      <td colspan='4'><div class='text-right'><?php echo html::a($this->inlink('managemembers', "orderID=$order->id"), $lang->order->manageMembers);?></div></td>
    </tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
