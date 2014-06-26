<?php 
/**
 * The view of view function of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='col-md-8'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $contact->realname;?></strong></div>
    <div class='panel-body'><?php echo $contact->desc;?></div>
  </div>
  <?php echo $this->fetch('action', 'history', "objectType=contact&objectID={$contact->id}")?>
  <div class='page-actions'>
    <?php
    echo html::a($this->createLink('action', 'createRecord', "objectType=contact&objectID={$contact->id}&customer={$contact->customer}"), $lang->contact->record, "data-toggle='modal' class='btn'");
    echo html::a(inlink('edit', "contactID=$contact->id"), $lang->edit, "class='btn'");
    echo html::a(inlink('delete', "contactID=$contact->id"), $lang->delete, "class='deleter btn'");
    echo html::a(inlink('browse'), $lang->goback, "class='btn'");
    ?>
  </div>
</div>
<div class='col-md-4'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->contact->basicInfo;?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-70px'><?php echo $lang->contact->customer;?></th>
          <td>
            <?php
            if(isset($customers[$contact->customer])) echo $customers[$contact->customer];
            if($contact->maker) echo " ({$lang->resume->maker})";
            ?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->resume->dept;?></th>
          <td><?php echo  $contact->dept;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->resume->title;?></th>
          <td><?php echo  $contact->title;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->resume->join;?></th>
          <td><?php echo  $contact->join;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contact->birthday;?></th>
          <td><?php echo formatTime($contact->birthday);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contact->gender;?></th>
          <td><?php echo zget($lang->contact->genderList, $contact->gender, '');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contact->createdDate;?></th>
          <td><?php echo $contact->createdDate;?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->contact->contactInfo;?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <?php foreach($config->contact->contactWayList as $item):?>
        <?php if(!empty($contact->{$item})):?>
        <tr>
          <th class='w-70px'><?php echo $lang->contact->{$item};?></th>
          <td><?php echo $contact->{$item};?></td>
        </tr>
        <?php endif;?>
        <?php endforeach;?>
      </table>
    </div>
  </div>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->contact->resume;?></strong></div>
    <table class='table table-data'>
      <tr class='text-center'>
        <th><?php echo $lang->resume->time;?></th>
        <th><?php echo $lang->resume->customer?></th>
        <th><?php echo $lang->resume->dept?></th>
        <th><?php echo $lang->resume->title?></th>
      </tr>
      <?php foreach($resumes as $resume):?>
      <tr class='text-center'>
        <td><?php echo $resume->join . $lang->minus . $resume->left;?></td>
        <td><?php if(isset($customers[$resume->customer])) echo $customers[$resume->customer]?></td>
        <td><?php echo $resume->dept?></td>
        <td><?php echo $resume->title?></td>
     </tr>
      <?php endforeach;?>
    </table>
  </div>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->contact->address;?></strong></div>
    <table class='table table-data'>
      <?php foreach($addresses as $address):?>
      <tr>
        <td><?php echo $address->title . $lang->colon . $address->fullLocation;?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
