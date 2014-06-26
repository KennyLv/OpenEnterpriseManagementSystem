<?php
/**
 * The html template file of select version method of upgrade module of ZenTaoPMS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id$
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<form method='post' action='<?php echo inlink('confirm');?>'>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->selectVersion;?></h3>
    </div>
    <div class='modal-body'>
      <div class='form-group'>
        <?php 
          echo html::select('fromVersion', $lang->upgrade->fromVersions, $version, "class='form-control single-input'");
          echo "&nbsp;&nbsp;<span class='text-danger help-inline'>{$lang->upgrade->versionNote}</span>";
        ?>
      </div>
    </div>
    <div class='modal-footer'>
      <?php echo html::submitButton($lang->upgrade->common);?>
    </div>
  </div>
</div>
</form>
<?php include '../../install/view/footer.html.php';?>
