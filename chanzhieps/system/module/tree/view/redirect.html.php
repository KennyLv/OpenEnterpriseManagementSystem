<?php
/**
 * The redirect view file of tree module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>

<div class='form-group'>
<div class='col-xs-6 col-md-6 col-md-offset-3 alert alert-info'>
  <i class='icon-info-sign'></i>
  <div class='content'>
    <h4><?php echo $message; ?></h4>
    <p><?php echo $lang->tree->timeCountDown; ?></p>
    <?php echo html::a($this->createLink('tree', 'browse', "type=$type"), $lang->tree->redirect, "class='btn btn-primary' id='countDownBtn'"); ?>
  </div>
</div>
</div>

<?php include '../../common/view/footer.admin.html.php';?>
