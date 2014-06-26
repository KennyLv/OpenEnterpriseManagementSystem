<?php 
/**
 * The create view of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->contact->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-condensed'>
      <div class='row'>
        <div class='col-md-9'>
          <table class='table table-form'>
            <tr>
              <th class='w-100px'><?php echo $lang->contact->realname;?></th>
              <td class='w-p40'><?php echo html::input('realname', '', "class='form-control'");?></td>
              <td>
                <input type='checkbox' name='maker' id='maker' value='1' />
                <label for='maker'><?php echo $lang->resume->maker;?></label>
              </td>
            
            </tr>
            <tr>
              <th><?php echo $lang->contact->customer;?></th>
              <td><?php echo html::select('customer', $customers, !empty($customer) ? $customer : '', "class='form-control chosen'");?></td>
              <td>
                <input type='checkbox' name='newCustomer' id='newCustomer' value='1' />
                <label for='newCustomer'><?php echo $lang->contact->newCustomer?></label>
              </td>
            </tr>
            <tr class='customerInfo hidden'>
              <th><?php echo $lang->contact->customerName;?></th>
              <td><?php echo html::input('name', '', "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->contact->gender;?></th>
              <td><?php echo html::radio('gender', $lang->contact->genderList, '');?></td>
            </tr>
            <tr>
              <th><?php echo $lang->resume->dept;?></th>
              <td><?php echo html::input('dept', '', "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->resume->title;?></th>
              <td><?php echo html::input('title', '', "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->resume->join;?></th>
              <td><?php echo html::input('join', '', "class='form-control'");?></td>
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
              <th><?php echo $lang->contact->phone;?></th>
              <td><?php echo html::input('phone', '', "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->contact->qq;?></th>
              <td><?php echo html::input('qq', '', "class='form-control'");?></td>
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
              <th><?php echo $lang->contact->createdDate;?></th>
              <td><?php echo html::input('createdDate', date('Y-m-d H:i:s'), "class='form-control form-datetime'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->contact->desc;?></th>
              <td colspan='2'><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
            </tr>
            <tr>
              <th></th>
              <td><?php echo html::submitButton() . html::backButton();?></td>
            </tr>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
