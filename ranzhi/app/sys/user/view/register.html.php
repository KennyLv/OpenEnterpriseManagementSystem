<?php
/**
 * The register view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user 
 * @version     $Id: register.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel panel-body'>
  <div class='panel panel-pure' id='reg'>
    <div class='panel-heading'><strong><?php echo $lang->user->register->welcome;?></strong></h4></div>
    <div class='panel-body'>
      <form method='post' id='ajaxForm' class='form-horizontal' role='form'>
        <div class='form-group'>
          <label class='col-xs-3 control-label required'><?php echo $lang->user->account;?></label>
          <div class='col-xs-9'><?php echo html::input('account', '', "class='form-control form-control' autocomplete='off' placeholder='" . $lang->user->register->lblAccount . "'");?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label required"><?php echo $lang->user->realname;?></label>
          <div class='col-xs-9'><?php echo html::input('realname', '', "class='form-control'");?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label required"><?php echo $lang->user->email;?></label>
          <div class='col-xs-9'><?php echo html::input('email', '', "class='form-control' autocomplete='off'") . '';?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label required"><?php echo $lang->user->password;?></label>
          <div class='col-xs-9'><?php echo html::password('password1', '', "class='form-control' autocomplate='off' placeholder='" . $lang->user->register->lblPassword . "'");?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label"><?php echo $lang->user->password2;?></label>
          <div class='col-xs-9'><?php echo html::password('password2', '', "class='form-control'");?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label"><?php echo $lang->user->company;?></label>
          <div class='col-xs-9'><?php echo html::input('company', '', "class='form-control'");?></div>
        </div>
        <div class='form-group'>
          <label class="col-xs-3 control-label"><?php echo $lang->user->phone;?></label>
          <div class='col-xs-9'><?php echo html::input('phone', '', "class='form-control'");?></div>
        </div>
        <div class='form-group'>
          <div class="col-xs-3"></div>
          <div class='col-xs-9'><?php echo html::submitButton($lang->register,'btn btn-primary btn-block') . html::hidden('referer', $referer);?></div>
        </div>
      </form>
    </div>
  </div>    
</div>
<?php include '../../common/view/footer.html.php'; ?>
