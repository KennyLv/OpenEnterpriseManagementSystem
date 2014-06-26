<?php
/**
 * The html template file of index method of install module of chanzhiEPS.
 *
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     chanzhiEPS
 * @version     $Id: index.html.php 867 2010-06-17 09:32:58Z wwccss $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<div class='container'>
  <div class='modal-dialog'>
    <div class="modal-header text-right"><div class='btn dropdown'><?php include '../../common/view/selectlang.html.php';?></div></div>
    <div class='modal-body'>
      <h3><?php echo $lang->install->welcome;?></h3>
      <div><?php echo $lang->install->desc;?></div>
    </div>
    <div class='modal-footer'>
      <div class='text-center mgb-10'>
        <label class='checkbox-inline'><input type='checkbox' id='agree' checked /><?php echo $lang->agreement;?></label>
      </div>
      <div class='input-group'>
      <?php echo html::a($this->createLink('install', 'step1'), $lang->install->start, "class='btn btn-primary btn-install'");?>
      </div>
    </div>
  </div>
</div>
<?php include './footer.html.php';?>
