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
      <h3><?php echo $lang->upgrade->index;?></h3>
    </div>
    <div class='modal-body'>
      <?php printf($lang->upgrade->setOkFile, $okFile, $okFile, $okFile);?>
    </div>
    <div class='modal-footer'>
      <?php echo html::a(inlink('backup'), $lang->upgrade->next, "class='btn btn-primary'");?>
    </div>
  </div>
</div>
<?php include '../../install/view/footer.html.php';?>
