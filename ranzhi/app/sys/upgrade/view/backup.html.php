<?php
/**
 * The html template file of index method of upgrade module of RanZhi.
 *
 * @copyright   Copyright 2013-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: backup.html.php 9770 2014-06-05 03:03:52Z guanxiying $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->backup;?></h3>
    </div>
    <div class='modal-body'>
      <?php printf($lang->upgrade->backupData, $db->user, $db->password, $db->name, inlink('selectVersion'));?>
    </div>
    <div class='modal-footer'>
      <?php echo html::a(inlink('selectVersion'), $lang->upgrade->next, "class='btn btn-primary'");?>
    </div>
  </div>
</div>
<?php include '../../install/view/footer.html.php';?>
