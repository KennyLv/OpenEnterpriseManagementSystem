<?php
/**
 * The html template file of deny method of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     RanZhi
 * @version     $Id: deny.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 */
$moduleName = isset($lang->$module->common)  ? $lang->$module->common:  $module;
$methodName = isset($lang->$module->$method) ? $lang->$module->$method: $method;
include '../../common/view/header.lite.html.php';
?>
<div class='container w-200px'>
  <div class='alert alert-danger'>
    <h2><?php echo $app->user->account, ' ', $lang->user->deny;?></h2>
    <p> <?php printf($lang->user->errorDeny, $moduleName, $methodName);?></p>
    <p>
    <?php
     echo html::a($this->createLink($config->default->module), $lang->index->common);
     if($refererBeforeDeny) echo html::a(helper::safe64Decode($refererBeforeDeny), $lang->user->goback);
     echo html::a($this->createLink('user', 'logout', "referer=" . helper::safe64Encode($denyPage)), $lang->user->relogin);
    ?>
  </div>
</div>
</body>
</html>
