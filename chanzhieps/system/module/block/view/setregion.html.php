<?php
/**
 * The setpage view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php js::set('key', count($blocks));?>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <?php echo html::closeButton();?>
      <h4 class='modal-title' id='myModalLabel'>
        <i class='icon-cog'></i> <?php echo $lang->block->setPage . ' - '. $lang->block->pages[$page] . ' - ' . $lang->block->regions->{$page}[$region];?>
      </h4>
    </div>
    <div class='modal-body'>
      <form id='ajaxForm' action="<?php echo inlink('setregion', "page={$page}&region={$region}");?>" method='post'>
        <table class='table table-striped table-form'>
          <thead>
            <tr>
              <th class='text-center col-xs-6'><?php echo $lang->block->title;?></th>
              <th class='text-center col-xs-2'><?php echo $lang->block->grid;?></th>
              <th class='text-center col-xs-2'><?php echo $lang->actions;?></th>
            </tr>
          </thead>
          <tbody>
          <?php $key = 0; foreach($blocks as $block){ echo $this->block->createEntry($block, $key); $key ++;  }?>
          </tbody>
          <tfoot>
            <tr><td colspan='3' class='a-center'> <?php echo html::submitButton();?></td></tr>
          </tfoot>
        </table>
      </form>
    </div>
    <table class='hide'><tbody id='entry'><?php echo $this->block->createEntry(null, 'key');?></tbody></table>
    <div class='modal-footer'></div>
  </div>
</div>
<?php if(isset($pageJS)) js::execute($pageJS);?>
