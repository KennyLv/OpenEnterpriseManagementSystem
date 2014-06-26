<?php
/**
 * The html template file of confirm method of upgrade module of RanZhi.
 *
 * @copyright   Copyright 2013-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: confirm.html.php 9770 2014-06-05 03:03:52Z guanxiying $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<form method='post' action='<?php echo inlink('execute');?>'>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->confirm;?></h3>
    </div>
    <div class='modal-body'>
      <div class='mg-10px'><?php echo html::textarea('', $confirm, "rows='10' class='w-p100 borderless'");?></div>
    </div>
    <div class='modal-footer'>
      <?php echo html::submitButton($lang->upgrade->execute) . html::hidden('fromVersion', $fromVersion);?>
    </div>
  </div>
</div>
</form>
<?php include '../../install/view/footer.html.php';?>
