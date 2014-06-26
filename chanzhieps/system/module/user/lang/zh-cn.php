<?php
/**
 * The user module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id: zh-cn.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.chanzhi.org
 */
$lang->user->common    = '用户';

$lang->user->id        = '编号';
$lang->user->account   = '用户名';
$lang->user->admin     = '管理员';
$lang->user->password  = '密码';
$lang->user->password2 = '请重复密码';
$lang->user->realname  = '真实姓名';
$lang->user->nickname  = '昵称';
$lang->user->avatar    = '头像';
$lang->user->birthyear = '出生年';
$lang->user->birthday  = '出生月日';
$lang->user->gender    = '性别';
$lang->user->email     = '邮箱';
$lang->user->msn       = 'MSN';
$lang->user->qq        = 'QQ';
$lang->user->yahoo     = '雅虎通';
$lang->user->gtalk     = 'Gtalk';
$lang->user->wangwang  = '旺旺';
$lang->user->mobile    = '手机';
$lang->user->phone     = '电话';
$lang->user->company   = '公司/组织';
$lang->user->address   = '通讯地址';
$lang->user->zipcode   = '邮编';
$lang->user->join      = '注册日期';
$lang->user->visits    = '访问次数';
$lang->user->ip        = '最后IP';
$lang->user->last      = '上次登录';
$lang->user->allowTime = '开放时间';
$lang->user->status    = '状态';
$lang->user->alert     = '您的帐号已被禁用';

$lang->user->list            = '会员列表';
$lang->user->view            = "用户详情";
$lang->user->create          = "添加用户";
$lang->user->edit            = "编辑用户";
$lang->user->changePassword  = "更改密码";
$lang->user->recoverPassword = "忘记密码";
$lang->user->newPassword     = "新密码";
$lang->user->update          = "编辑用户";
$lang->user->delete          = "删除用户";
$lang->user->browse          = "浏览用户";
$lang->user->deny            = "访问受限";
$lang->user->confirmDelete   = "您确认删除该用户吗？";
$lang->user->confirmActivate = "您确认激活该用户吗？";
$lang->user->relogin         = "重新登录";
$lang->user->asGuest         = "游客访问";
$lang->user->goback          = "返回前一页";
$lang->user->allUsers        = '全部用户';
$lang->user->submit          = "提交";
$lang->user->forbid          = '禁用';
$lang->user->activate        = '解禁';
$lang->user->pullWechatFans  = '更新微信会员数据';

$lang->user->profile     = '个人信息';
$lang->user->editProfile = '编辑信息';
$lang->user->thread      = '我的主题';
$lang->user->messages    = '我的消息';
$lang->user->reply       = '我的回贴';

$lang->user->message = new stdclass();
$lang->user->message->mine = "我的消息 <span class='label label-badge text-latin'>%s</span>";
$lang->user->message->from = '来自';

$lang->user->inputUserName       = '请输入用户名';
$lang->user->inputAccountOrEmail = '请输入用户名或Email';
$lang->user->inputPassword       = '请输入密码';
$lang->user->searchUser          = '搜索';

$lang->user->errorDeny       = "抱歉，您无权访问『<b>%s</b>』模块的『<b>%s</b>』功能。请联系管理员获取权限。点击后退返回上页。<br/> 5秒钟后将自动返回首页...";
$lang->user->loginFailed     = "登录失败，请检查您的用户名或密码是否填写正确。";
$lang->user->locked          = "用户已经被锁定，请%s后再重新尝试登录";
$lang->user->lockedForEver   = "用户已经被永久禁用。";
$lang->user->lblRegistered   = '恭喜您，已经成功注册。';
$lang->user->forbidSuccess   = '禁用成功';
$lang->user->forbidFail      = '禁用失败';
$lang->user->activateSuccess = '解除禁用成功';
$lang->user->activateFail    = '解除禁用失败';
$lang->user->pullSuccess     = '获取微信会员成功';

$lang->user->forbidUser          = '禁用管理';
$lang->user->forbidDate = array();
$lang->user->forbidDate['1']     = '一天';
$lang->user->forbidDate['2']     = '两天';
$lang->user->forbidDate['3']     = '三天';
$lang->user->forbidDate['7']     = '一周';
$lang->user->forbidDate['30']    = '一个月';
$lang->user->forbidDate['3000']  = '永久';
$lang->user->operate             = '操作';

$lang->user->genderList = new stdclass();
$lang->user->genderList->m = '男';
$lang->user->genderList->f = '女';
$lang->user->genderList->u = '';

$lang->user->register  = new stdclass();
$lang->user->register->common      = '注册';
$lang->user->register->welcome     = '欢迎注册成为会员';
$lang->user->register->why         = '欢迎注册成为我们的会员，您可以享受更多的服务。';
$lang->user->register->lblUserInfo = '用户信息';
$lang->user->register->lblAccount  = '必须是三位以上的英文字母或数字';
$lang->user->register->lblPassword = '数字和字母组成，六位以上';

$lang->user->notice = new stdclass();
$lang->user->notice->password = '字母和数字组合，最少六位';

$lang->user->login  = new stdclass();
$lang->user->login->common  = "登录";
$lang->user->login->welcome = '已有帐号';
$lang->user->login->why     = '欢迎登陆，享用会员专属服务！';

$lang->user->resetPassword = new stdclass();
$lang->user->resetPassword->success    = "密码更改链接已经发送到您的邮箱中";
$lang->user->resetPassword->failed     = "您的密保邮箱错误，请重新输入";

$lang->user->resetmail = new stdclass();
$lang->user->resetmail->subject  = '密码修改';
$lang->user->resetmail->notice   = '系统发信，请勿回复';
$lang->user->resetmail->account  = '尊敬的用户'; 
$lang->user->resetmail->resetUrl = '请点击下面的链接，进行密码修改：'; 
$lang->user->resetmail->reset    = '重置码：'; 

$lang->user->oauth = new stdclass();
$lang->user->oauth->common       = '开放登录';
$lang->user->oauth->provider     = '服务商';
$lang->user->oauth->verification = '网站验证';
$lang->user->oauth->widget       = '网页组件';

$lang->user->oauth->sina = new stdclass();
$lang->user->oauth->sina->clientID     = 'App Key';
$lang->user->oauth->sina->clientSecret = 'App Secret';

$lang->user->oauth->qq = new stdclass();
$lang->user->oauth->qq->clientID     = 'APP ID';
$lang->user->oauth->qq->clientSecret = 'APP KEY';

$lang->user->oauth->providers['sina'] = '新浪微博';
$lang->user->oauth->providers['qq']   = 'QQ';

$lang->user->oauth->lblWelcome    = '开放登录，快捷方便';
$lang->user->oauth->lblProfile    = "<h3>设置用户名，完成注册</h3>";
$lang->user->oauth->lblBind       = "<h3>或绑定已有帐号</h3>";
$lang->user->oauth->lblBindFailed = "绑定账户失败！";

$lang->user->statusList = new stdclass();
$lang->user->statusList->locked    = "<label class='label label-danger'>锁定</label>";
$lang->user->statusList->forbidden = "<label class='label label-danger'>禁用</label>";
$lang->user->statusList->normal    = "<label class='label label-success'>正常</label>";

$lang->user->control = new stdclass();
$lang->user->control->common      = '用户中心';
$lang->user->control->welcome     = '欢迎您，<strong>%s</strong>';
$lang->user->control->lblPassword = "留空，则保持不变。";

$lang->user->control->menus[10] = '<i class="icon-user"></i> 个人信息 <i class="icon-chevron-right"></i>|user|profile';
$lang->user->control->menus[20] = '<i class="icon-edit"></i> 编辑信息 <i class="icon-chevron-right"></i>|user|edit';
$lang->user->control->menus[28] = '<i class="icon-comments-alt"></i> 我的消息 <i class="icon-chevron-right"></i>|user|message';
$lang->user->control->menus[30] = '<i class="icon-share"></i> 我的主题 <i class="icon-chevron-right"></i>|user|thread';
$lang->user->control->menus[40] = '<i class="icon-mail-reply"></i> 我的回帖 <i class="icon-chevron-right"></i>|user|reply';
