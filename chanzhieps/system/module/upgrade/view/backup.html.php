<?php
/**
 * The html template file of index method of upgrade module of ZenTaoPMS.
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
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->backup;?></h3>
    </div>
    <div class='modal-body'>
      <?php printf($lang->upgrade->backupData, $db->user, $db->password, $db->name, inlink('selectVersion'));?>
      <?php if(version_compare($this->loadModel('setting')->getVersion(), 2.3) < 0):?>
      <div class='text-left'>
        <label class='checkbox'><input type='checkbox' id='agree' checked /><?php echo $lang->agreement;?></label>
      </div>
      <?php endif;?>
    </div>
    <div class='modal-footer'>
      <?php echo html::a(inlink('selectVersion'), $lang->upgrade->next, "class='btn btn-primary'");?>
    </div>
  </div>
</div>
<?php include '../../install/view/footer.html.php';?>
