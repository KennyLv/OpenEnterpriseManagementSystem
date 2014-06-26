<?php
/**
 * The browse view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-columns'></i> <?php echo $lang->block->browseRegion;?></strong></div>
  <table class='table table-bordered table-hover table-striped'>
    <tr>
      <th class='w-200px'><?php echo $lang->block->page;?></th>
      <th class='text-center'><?php echo $lang->block->regionList;?></th>
    </tr>
    <?php foreach($this->lang->block->pages as $page => $name):?>
    <?php if(empty($lang->block->regions->$page)) continue;?>
    <tr>
      <td><?php echo $name;?></td>
      <td>
      <?php
      $regions = $lang->block->regions->$page;
      foreach($regions as $region => $regionName)
      {
          echo html::a($this->inlink('setregion', "page={$page}&region={$region}"), $regionName, "class='btn btn-xs' data-toggle='modal'");
      }
      ?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
