<?php 
/**
 * The browse view file of depositor module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-group"></i> <?php echo $lang->depositor->browse;?></strong>
    <div class='panel-actions pull-right'>
      <?php echo html::a(inlink('create'), "<i class='icon-plus'>{$lang->depositor->create}</i>", "class='btn btn-primary' data-toggle='modal'")?>
    </div>
  </div>
  <div class='panel-body'>
    <?php foreach($depositors as $depositor):?>
    <div class='col-md-4'>
      <div class='panel'>
        <div class='panel-body'>
          <div class='lead'><?php echo $depositor->abbr;?></div>
          <div class='info'>
          <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->type} {$lang->colon} </dt><dd>{$lang->depositor->typeList[$depositor->type]}</dd></dl>";?>
          <?php if($depositor->type != 'cash'):?>
          <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->title} {$lang->colon} </dt><dd>$depositor->title</dd></dl>";?>
          <?php if($depositor->type == 'bank') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->bankProvider} {$lang->colon} </dt><dd>$depositor->provider </dd></dl>";?>
          <?php if($depositor->type == 'online') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->serviceProvider} {$lang->colon} </dt><dd>{$lang->depositor->providerList[$depositor->provider]} </dd></dl>";?>
          <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->account} {$lang->colon} </dt><dd>$depositor->account</dd></dl>";?>
          <?php if($depositor->type == 'bank') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->bankcode} {$lang->colon} </dt><dd>$depositor->bankcode</dd></dl>";?>
          <?php if($depositor->type != 'cash') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->public} {$lang->colon} </dt><dd>{$lang->depositor->publicList[$depositor->public]}</dd></dl>";?>
          <?php endif;?>
          <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->currency} {$lang->colon} </dt><dd>{$lang->depositor->currencyList[$depositor->currency]}</dd></dl>";?>
          <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->status} {$lang->colon} </dt><dd>{$lang->depositor->statusList[$depositor->status]}</dd></dl>";?>
          </div>
          <div class='pull-right'>
            <?php echo html::a(inlink('edit', "depositorID=$depositor->id"), $lang->edit, "data-toggle='modal'");?>
            <?php echo html::a(inlink('check', "depositorID=$depositor->id"), $lang->depositor->check);?>
            <?php if($depositor->status == 'normal') echo html::a(inlink('forbid', "depositorID=$depositor->id"), $lang->depositor->forbid, "data-toggle=modal");?>
            <?php if($depositor->status == 'disable') echo html::a(inlink('activate', "depositorID=$depositor->id"), $lang->depositor->activate, "data-toggle=modal");?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
