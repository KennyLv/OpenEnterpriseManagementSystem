<?php
/**
 * The user module english file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->user->common    = 'User';

$lang->user->id        = 'ID';
$lang->user->account   = 'Account';
$lang->user->admin     = 'Admin';
$lang->user->password  = 'Password';
$lang->user->password2 = 'Repeat it';
$lang->user->realname  = 'Name';
$lang->user->nickname  = 'Nick';
$lang->user->avatar    = 'Avatar';
$lang->user->birthyear = 'Birthyear';
$lang->user->birthday  = 'Birthday';
$lang->user->gender    = 'Gendar';
$lang->user->email     = 'Email';
$lang->user->msn       = 'MSN';
$lang->user->qq        = 'QQ';
$lang->user->yahoo     = 'Y!';
$lang->user->gtalk     = 'GTalk';
$lang->user->wangwang  = 'Wangwang';
$lang->user->mobile    = 'Mobile';
$lang->user->phone     = 'Phone';
$lang->user->company   = 'Company';
$lang->user->address   = 'Address';
$lang->user->zipcode   = 'Zipcode';
$lang->user->join      = 'Join Date';
$lang->user->visits    = 'Visits';
$lang->user->ip        = 'Last ip address';
$lang->user->last      = 'Last login time';
$lang->user->allowTime = 'Allow time';
$lang->user->status    = 'Status';
$lang->user->alert     = 'Your account has been forbidden';

$lang->user->list            = 'User list';
$lang->user->view            = "User info";
$lang->user->create          = "Add a user";
$lang->user->edit            = "Edit user";
$lang->user->changePassword  = "Change password";
$lang->user->recoverPassword = "recover password";
$lang->user->newPassword     = "New password";
$lang->user->update          = "Edit user";
$lang->user->delete          = "Delete user";
$lang->user->browse          = "Borwse";
$lang->user->deny            = "Access denied";
$lang->user->confirmDelete   = "Are you sure to delete this user?";
$lang->user->confirmActivate = "Are you sure to activate this user?";
$lang->user->relogin         = "Relogin";
$lang->user->asGuest         = "Visits as guest";
$lang->user->goback          = "Go back";
$lang->user->allUsers        = 'All users';
$lang->user->submit          = "Submit";
$lang->user->forbid          = 'Forbid';
$lang->user->activate        = 'Activate';
$lang->user->pullWechatFans  = 'Pull wechat uses';

$lang->user->profile     = 'Profile';
$lang->user->editProfile = 'Edit profile';
$lang->user->thread      = 'My threads';
$lang->user->messages    = 'My Messages';
$lang->user->reply       = 'My replies';

$lang->user->message = new stdclass();
$lang->user->message->mine = "My message <span class='label label-badge text-latin'>%s</span>";
$lang->user->message->from = 'From';

$lang->user->inputUserName       = 'Please input your username';
$lang->user->inputAccountOrEmail = 'Please input account or Email';
$lang->user->inputPassword       = 'Please input password';
$lang->user->searchUser          = 'Search';

$lang->user->errorDeny       = "Sorry, you don't have the permission to access <b>%s</b>'s<b>%s</b>. Please contact the administrator.<br/> This page will jump to homepage after 5 seconds";
$lang->user->loginFailed     = "Login failed, please check you account and password.";
$lang->user->locked          = "Failed too much, please login again after ten minutes";
$lang->user->lockedForEver   = "User has been forbidden for ever.";
$lang->user->lblRegistered   = 'Congratulations, register successfully!';
$lang->user->forbidSuccess   = 'Successfully forbid.';
$lang->user->forbidFail      = 'Failed forbid';
$lang->user->activateSuccess = 'Successfully activate.';
$lang->user->activateFail    = 'Failed activate.';
$lang->user->pullSuccess     = 'Get wechat users successfully';

$lang->user->forbidUser = 'Manage user';
$lang->user->forbidDate = array();
$lang->user->forbidDate['1']     = '1d';
$lang->user->forbidDate['2']     = '2d';
$lang->user->forbidDate['3']     = '3d';
$lang->user->forbidDate['7']     = '7d';
$lang->user->forbidDate['30']    = '30d';
$lang->user->forbidDate['3000']  = 'ever';
$lang->user->operate             = 'Operate';

$lang->user->genderList = new stdclass();
$lang->user->genderList->m = 'Male';
$lang->user->genderList->f = 'Female';
$lang->user->genderList->u = '';

$lang->user->register  = new stdclass();
$lang->user->register->common     = 'Register';
$lang->user->register->welcome    = 'Welcome to join the membership.';
$lang->user->register->why        = 'After register, you can enjoy more features and services.';
$lang->user->register->lblUserInfo= 'User info';
$lang->user->register->lblAccount = 'The account must be a series of letters and/or numbers';
$lang->user->register->lblPassword= 'Please set you password, at lest six letters or numbers.';

$lang->user->notice = new stdclass();
$lang->user->notice->password = 'Numbers and letters, at least six';

$lang->user->login  = new stdclass();
$lang->user->login->common  = "Login";
$lang->user->login->welcome = 'Welcome';
$lang->user->login->why     = 'Login, and use more feature.';

$lang->user->resetPassword = new stdclass();
$lang->user->resetPassword->success    = "Password change link has been sent to your mailbox";
$lang->user->resetPassword->failed     = "Please input your correct mail";

$lang->user->resetmail = new stdclass();
$lang->user->resetmail->subject  = 'Modify password';
$lang->user->resetmail->notice   = 'System letter, please do not reply';
$lang->user->resetmail->account  = 'Hello,'; 
$lang->user->resetmail->resetUrl = 'Please click the link to change your password:';
$lang->user->resetmail->reset    = 'Reset Key:'; 

$lang->user->oauth = new stdclass();
$lang->user->oauth->common       = 'OAuth';
$lang->user->oauth->provider     = 'Provider';
$lang->user->oauth->verification = 'Verification';
$lang->user->oauth->widget       = 'Widget';

$lang->user->oauth->sina = new stdclass();
$lang->user->oauth->sina->clientID     = 'App Key';
$lang->user->oauth->sina->clientSecret = 'App Secret';

$lang->user->oauth->qq = new stdclass();
$lang->user->oauth->qq->clientID     = 'APP ID';
$lang->user->oauth->qq->clientSecret = 'APP KEY';

$lang->user->oauth->providers['sina'] = 'Sina weibo';
$lang->user->oauth->providers['qq']   = 'QQ';

$lang->user->oauth->lblWelcome    = 'OAuth login';
$lang->user->oauth->lblProfile    = "<h3>Register a new account</h3>";
$lang->user->oauth->lblBind       = "<h3>Or bind an registered account</h3>";
$lang->user->oauth->lblBindFailed = "Bind user failed！";

$lang->user->statusList = new stdclass();
$lang->user->statusList->locked    = "<label class='label label-danger'>Locked</label>";
$lang->user->statusList->forbidden = "<label class='label label-danger'>Forbidden</label>";
$lang->user->statusList->normal    = "<label class='label label-success'>Normal</label>";

$lang->user->control = new stdclass();
$lang->user->control->common      = 'User dashboard';
$lang->user->control->welcome     = 'Welcome, <strong>%s</strong>';
$lang->user->control->lblPassword = "Keep empty, will not change it.";

$lang->user->control->menus[10] = '<i class="icon-large icon-user"></i> Profile <i class="icon-chevron-right"></i>|user|profile';
$lang->user->control->menus[20] = '<i class="icon-large icon-edit"></i> Edit <i class="icon-chevron-right"></i>|user|edit';
$lang->user->control->menus[28] = '<i class="icon-large icon-comments-alt"></i> Messages <i class="icon-chevron-right"></i>|user|message';
$lang->user->control->menus[30] = '<i class="icon-large icon-share"></i> Threads <i class="icon-chevron-right"></i>|user|thread';
$lang->user->control->menus[40] = '<i class="icon-large icon-mail-reply"></i> Replies <i class="icon-chevron-right"></i>|user|reply';
