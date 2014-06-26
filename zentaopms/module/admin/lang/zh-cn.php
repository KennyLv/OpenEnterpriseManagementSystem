<?php
/**
 * The admin module zh-cn file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     admin
 * @version     $Id: zh-cn.php 4767 2013-05-05 06:10:13Z wwccss $
 * @link        http://www.zentao.net
 */
$lang->admin->common  = '后台管理';
$lang->admin->index   = '后台管理首页';
$lang->admin->checkDB = '检查数据库';
$lang->admin->company = '公司管理';
$lang->admin->user    = '用户管理';
$lang->admin->group   = '分组管理';
$lang->admin->welcome = '欢迎使用禅道管理软件后台管理系统';

$lang->admin->browseCompany = '浏览公司';

$lang->admin->clearData             = '重置禅道';
$lang->admin->pleaseInputYes        = '确认重置禅道数据请输入yes：';
$lang->admin->confirmClearData      = '您确认要重置禅道数据吗?';
$lang->admin->clearDataFailed       = '禅道重置失败！';
$lang->admin->clearDataSuccessfully = '禅道重置成功！';
$lang->admin->clearDataDesc    = <<<EOT
当您测试禅道完毕之后，可以使用重置功能清除测试数据。该操作会保留公司、部门、用户和权限分组的数据，其他的数据会被清空。<br />
<strong class='text-danger f-14px'>该功能存在极大的风险，执行之前务必三思!</strong>
EOT;

$lang->admin->info = new stdclass();
$lang->admin->info->caption = '禅道系统信息';
$lang->admin->info->version = '当前系统的版本是%s，';
$lang->admin->info->links   = '您可以访问以下链接：';
$lang->admin->info->account = "您的禅道社区账户为%s。";

$lang->admin->notice = new stdclass();
$lang->admin->notice->register = "友情提示：您还未在禅道社区(www.zentao.net)登记，%s进行登记，以及时获得禅道最新信息。";
$lang->admin->notice->ignore   = "不再提示";

$lang->admin->register = new stdclass();
$lang->admin->register->caption    = '禅道社区登记';
$lang->admin->register->click      = '点击此处';
$lang->admin->register->lblAccount = '请设置您的用户名，英文字母和数字的组合，三位以上。';
$lang->admin->register->lblPasswd  = '请设置您的密码。数字和字母的组合，六位以上。';
$lang->admin->register->submit     = '登记';
$lang->admin->register->bind       = "如果您已经拥有社区账号，%s关联账户";
$lang->admin->register->success    = "登记账户成功";

$lang->admin->bind = new stdclass();
$lang->admin->bind->caption  = '关联社区账号';
$lang->admin->bind->action   = '关联';
$lang->admin->bind->success  = "关联账户成功";
