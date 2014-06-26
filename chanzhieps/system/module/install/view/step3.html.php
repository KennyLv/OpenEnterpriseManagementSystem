<?php
/**
 * The html template file of step3 method of install module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author	  Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package	 chanzhiEPS
 * @version	 $Id: step3.html.php 824 2010-05-02 15:32:06Z wwccss $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<div class='container'>
  <div class='modal-dialog'>
    <?php if(isset($error)):?>
    <div class='modal-header'><strong><?php echo $lang->install->error;?></strong></div>
    <div class='modal-body'><div class='alert alert-danger'><?php echo $error;?></div></div>
    <div class='modal-footer'><?php echo html::backButton($lang->install->pre, 'btn btn-primary');?></div>
    <?php else: ?>
    <div class='modal-header'><strong><?php echo $lang->install->saveConfig;?></strong></div>
    <div class='modal-body'>
      <div class='form-group'><?php echo html::textArea('config', $result->content, "rows='10' class='form-control small'");?></div>
      <div class='alert alert-warning'><?php printf($lang->install->save2File, $result->myPHP);?></div>
    </div>
    <div class='modal-footer'><?php echo html::a(inlink('step4'), $lang->install->next, "class='btn btn-primary'");?></div>
    <?php endif;?>
  </div>
</div>
<?php include './footer.html.php';?>
