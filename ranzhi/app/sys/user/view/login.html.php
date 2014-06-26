<?php
/**
 * The login view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user 
 * @version     $Id: login.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php
include '../../common/view/header.lite.html.php';
js::import($jsRoot . 'md5.js');
js::set('scriptName', $_SERVER['SCRIPT_NAME']);
js::set('random', $this->session->random);
css::internal('body{background-color:#f6f5f5}');
?> 
<style>body{padding-top:70px;}</style>
<div class='container'>
  <div id='adminLogin'>
    <form method='post' id='ajaxForm'>
      <div id='logo' class='text-center'><?php echo html::image("$themeRoot/default/images/main/logo.login.png");?></div>
      <div id='responser' class='text-center'></div>
      <?php echo html::input('account','',"class='form-control' placeholder='{$lang->user->inputAccountOrEmail}'");?>
      <?php echo html::password('password','',"class='form-control' placeholder='{$lang->user->inputPassword}'");?>
      <?php echo html::hidden('referer', $referer);?>
      <?php echo html::submitButton($lang->user->login->common, 'btn btn-primary btn-block');?>
    </form>
  </div>
</div>
<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);
?>
</body>
</html>
