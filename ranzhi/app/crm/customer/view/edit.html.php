<?php 
/**
 * The edit view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='row'>
  <form method='post' id='ajaxForm' class='form-condensed'>
     <div class='col-md-8'>
       <div class='panel'>
         <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->edit;?></strong></div>
         <div class='panel-body'>
           <table class='table table-form table-data'>
             <tr>
               <th class='w-70px'><?php echo $lang->customer->name;?></th>
               <td><?php echo html::input('name', $customer->name, "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->intension;?></th>
               <td><?php echo html::textarea('intension', $customer->intension, "class='form-control' rows=2");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->desc;?></th>
               <td><?php echo html::textarea('desc', $customer->desc, "rows='2' class='form-control'");?></td>
             </tr>
           </table>
         </div>
       </div>
       <?php echo $this->fetch('action', 'history', "objectType=customer&objectID={$customer->id}")?>
       <div class='page-actions'><?php echo html::submitButton() . html::backButton();?></div>
     </div>
     <div class='col-md-4'>  
       <div class='panel'>
         <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->basicInfo;?></strong></div>
         <div class='panel-body'>
           <table class='table table-info'>
             <tr>
               <th class='w-70px'><?php echo $lang->customer->level;?></th>
               <td><?php echo html::select('level', $lang->customer->levelList, $customer->level, "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->status;?></th>
               <td><?php echo html::select("status", $lang->customer->statusList, $customer->status, "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->size;?></th>
               <td><?php echo html::select('size', $lang->customer->sizeList, $customer->size, "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->type;?></th>
               <td><?php echo html::select("type", $lang->customer->typeList, $customer->type, "class='form-control'");?></td><td></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->industry;?></th>
               <td><?php echo html::select('industry', $industry, $customer->industry, "class='form-control chosen'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->area;?></th>
               <td><?php echo html::select('area', $area,  $customer->area, "class='form-control chosen'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->weibo;?></th>
               <td><?php echo html::input('weibo', $customer->weibo ? $customer->weibo : 'http://weibo.com/', "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->weixin;?></th>
               <td><?php echo html::input('weixin', $customer->weixin, "class='form-control'");?></td>
             </tr>
             <tr>
               <th><?php echo $lang->customer->site;?></th>
               <td><?php echo html::input('site', $customer->site ? $customer->site : 'http://', "class='form-control'");?></td><td></td>
             </tr>
           </table>
         </div>
       </div>
     </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
