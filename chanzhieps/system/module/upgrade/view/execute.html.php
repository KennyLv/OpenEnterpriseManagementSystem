<?php
/**
 * The html template file of execute method of upgrade module of ZenTaoPMS.
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
  <div class='modal-dialog w-450px'>
    <?php if($result == 'fail'):?>
    <div class='modal-header'><h3><?php echo $lang->upgrade->fail;?></h3></div>
    <div class='modal-body'><?php echo nl2br(join('\n', $errors)); ?></div>
    <?php else:?>
    <div class='modal-body'><div class='alert alert-success text-center'><h4><?php echo $lang->upgrade->success;?></h4></div></div>
    <div class='modal-footer'><?php echo html::a('index.php', $lang->home, "class='btn btn-success'");?></div>
    <?php endif;?>
  </div>
</div>
<?php include '../../install/view/footer.html.php';?>
