<?php include '../../common/view/header.html.php';?>
<div class='row'>
  <div class='col-md-6'>
    <div class='panel panel-default'>
      <div class='panel-heading'><?php echo $lang->user->oauth->lblProfile;?></div>
      <div class='panel-body'>
        <form method='post' id='registerForm' action='<?php echo $this->createLink('user', 'oauthRegister');?>' role='form'>
          <div class='form-group'>
            <label for='username'><?php echo $lang->user->account;?></label>
            <?php echo html::input('account', '', "placeholder='{$lang->user->register->lblAccount}'") . '<font color="red">*</font>';?>
          </div>
          <div class='form-group'>
            <label for='email'><?php echo $lang->user->email;?></label>
            <?php echo html::input('email') . '<font color="red">*</font>';?>
          </div>
          <?php 
          echo html::submitButton('', 'btn btn-success btn-wider');
          echo html::hidden('referer', $referer);
          ?>
        </form>
      </div>
    </div>
  </div>
  <div class='col-md-6'>
    <div class='panel panel-default'>
      <div class='panel-heading'><?php echo $lang->user->oauth->lblBind;?></div>
      <div class='panel-body'>
        <form method='post' id='bindForm' action='<?php echo $this->createLink('user', 'oauthBind');?>' role='form'>
          <div class='form-group'>
            <label for='useraccount'><?php echo $lang->user->account;?></label>
            <?php echo html::input('account')?>
          </div>
          <div class='form-group'>
            <label for='password'><?php echo $lang->user->password;?></label>
            <?php echo html::password('password');?>
          </div>
          <?php 
          echo html::submitButton($lang->login, 'btn btn-success btn-wider');
          echo html::hidden('referer', $referer);
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
