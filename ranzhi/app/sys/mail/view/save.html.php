<?php
/**
 * The save view file of mail module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     mail 
 * @version     $Id: save.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-envelope'></i> <?php echo $lang->mail->common;?> <i class='icon-arrow-right'></i> <?php echo $lang->mail->save; ?></strong></div>
  <div class='panel-body'>
    <div class='alert alert-success'>
      <i class='icon-ok-sign'></i>
      <div class='content'><?php echo $lang->mail->successSaved; ?></div>
    </div>
    <div><?php if($this->post->turnon and $mailExist) echo html::linkButton($lang->mail->test, inlink('test')); ?></div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
