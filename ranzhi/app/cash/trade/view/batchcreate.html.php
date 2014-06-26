<?php
/**
 * The batch create view of trade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('dittoText', $lang->ditto);?>
<form id='ajaxForm' method='post'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->trade->batchCreate;?></strong></div>
    <table class='table'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->trade->depositor;?></th>
          <th class='w-100px'><?php echo $lang->trade->type;?></th> 
          <th class='w-200px'><?php echo $lang->trade->category;?></th> 
          <th class='w-200px'><?php echo $lang->trade->trader;?></th> 
          <th class='w-120px'><?php echo $lang->trade->money;?></th>
          <th class='w-200px'><?php echo $lang->trade->handlers;?></th>
          <th class='w-150px'><?php echo $lang->trade->date;?></th>
          <th><?php echo $lang->trade->desc;?></th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i < $config->trade->batchCreate; $i++):?>
        <tr>
          <td><?php echo html::select("depositor[$i]", $depositors, '', "class='form-control'");?></td>
          <td><?php echo html::select("type[$i]", $lang->trade->typeList, 'out', "class='form-control type'");?></td>
          <td>
            <?php echo html::select("incomeType[$i]", $incomeTypes, '', "class='form-control in' style='display:none'");?>
            <?php echo html::select("expenseType[$i]", $expenseTypes, '', "class='form-control out'");?>
          </td>
          <td>
            <?php echo html::input("trader[$i]", '', "class='form-control out'");?>
            <?php echo html::select("customer[$i]", $customerList, '', "class='form-control in' style='display:none'");?>
          </td>
          <td><?php echo html::input("money[$i]", '', "class='form-control'");?></td>
          <td><?php echo html::select("handlers[$i]", $users, '', "class='form-control chosen' multiple");?></td>
          <td><?php echo html::input("date[$i]", '', "class='form-control form-date'");?></td>
          <td><?php echo html::textarea("desc[$i]", '', "rows='1' class='form-control'");?></td>
        </tr>
        <?php endfor;?>
      </tbody>
      <tr><td colspan='6' class='text-center'><?php echo html::submitButton() . html::backButton();?></td></tr>
    </table>
  </div>
</form>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
