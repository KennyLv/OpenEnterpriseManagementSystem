<?php 
/**
 * The create view file of balance module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     balance 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('currencyList', $lang->depositor->currencyList);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->balance->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p60'>
       <tr>
          <th class='w-100px'><?php echo $lang->balance->depositor;?></th>
          <td>
            <select name='depositor' id='depositor' class='form-control'>
            <?php foreach($depositorList as $depositor):?>
            <option value="<?php echo $depositor->id;?>" data-currency="<?php echo $depositor->currency;?>"><?php echo $depositor->abbr;?></option>
            <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->balance->date;?></th>
          <td><?php echo html::input('date', date('Y-m-d'), "class='form-control form-date'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->balance->money;?></th>
          <td>
            <div class='row'>
              <div class='col-sm-9'><?php echo html::input('money', '', "class='form-control'");?></div>
              <div class='col-sm-3 currency'></div>
            </div>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
