<?php
include '../../common/view/header.lite.html.php';
js::import($jsRoot . 'md5.js');
js::set('scriptName', $_SERVER['SCRIPT_NAME']);
js::set('random', $this->session->random);
css::internal('body{background-color:#f6f5f5}');
?> 
<div class='container'>
  <div id='adminLogin'>
    <form method='post' id='ajaxForm'>
      <div id='logo' class='text-center'><?php echo html::image("$themeRoot/default/images/main/logo.login.png");?></div>
      <div id='formError' class='alert alert-danger hiding'></div>
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
