<?php
/**
 * The zh-cn file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: zh-cn.php 9911 2014-06-13 05:19:10Z guanxiying $
 * @link        http://www.ranzhi.org
 */
$lang->colon   = ' : ';
$lang->prev    = '‹';
$lang->next    = '›';
$lang->laquo   = '&laquo;';
$lang->raquo   = '&raquo;';
$lang->minus   = ' - ';
$lang->RMB     = '￥';
$lang->divider = "<span class='divider'>{$lang->raquo}</span> ";
$lang->at      = ' 于 ';
$lang->by      = ' 由 ';
$lang->ditto   = '同上';
$lang->submitting   = '稍候...';

/* Apps lang items.*/
$lang->apps = new stdclass();
$lang->apps->crm  = '客户';
$lang->apps->cash = '财务';
$lang->apps->oa   = '办公';
$lang->apps->sys  = '通用';
$lang->apps->team = '团队';

/* Lang items for ranzhi. */
$lang->ranzhi  = '然之协同';
$lang->poweredBy = "<span id='poweredBy'><a href='http://www.ranzhi.org/?v=%s' target='_blank'>{$lang->ranzhi}%s</a></span>";

/* IE6 alert.  */
$lang->IE6Alert= <<<EOT
    <div class='alert alert-danger' style='margin-top:100px;'>
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h2>请使用其他浏览器访问本站。</h2>
      <p>珍爱上网，远离IE！</p>
      <p>我们检测到您正在使用Internet Explorer 6 ——  IE6 浏览器, IE6 于2001年8月27日推出，而现在它已十分脱节。速度慢、不安全、不能很好的展示新一代网站。<br/></p>
      <a href='https://www.google.com/intl/zh-hk/chrome/browser/' class='btn btn-primary btn-lg' target='_blank'>谷歌浏览器</a>
      <a href='http://www.firefox.com/' class='btn btn-primary btn-lg' target='_blank'>火狐浏览器</a>
      <a href='http://www.opera.com/download' class='btn btn-primary btn-lg' target='_blank'>Opera浏览器</a>
      <p></p>
    </div>
EOT;

/* Global lang items. */
$lang->home           = '首页';
$lang->welcome        = '欢迎您，<strong>%s</strong>！';
$lang->messages       = "<strong><i class='icon-comment-alt'></i> %s</strong>";
$lang->todayIs        = '今天是%s，';
$lang->aboutUs        = '关于我们';
$lang->about          = '关于';
$lang->link           = '友情链接';
$lang->frontHome      = '前台';
$lang->forumHome      = '论坛';
$lang->bookHome       = '手册';
$lang->dashboard      = '成员中心';
$lang->register       = '注册';
$lang->logout         = '退出';
$lang->login          = '登录';
$lang->account        = '帐号';
$lang->password       = '密码';
$lang->changePassword = '修改密码';
$lang->currentPos     = '当前位置';
$lang->categoryMenu   = '分类导航';
$lang->basicInfo      = '基本信息';

/* Global action items. */
$lang->reset          = '重填';
$lang->add            = '添加';
$lang->edit           = '编辑';
$lang->copy           = '复制';
$lang->and            = '并且';
$lang->or             = '或者';
$lang->hide           = '隐藏';
$lang->delete         = '删除';
$lang->close          = '关闭';
$lang->finish         = '完成';
$lang->cancel         = '取消';
$lang->save           = '保存';
$lang->confirm        = '确认';
$lang->preview        = '预览';
$lang->goback         = '返回';
$lang->search         = '搜索';
$lang->assign         = '指派';
$lang->create         = '新建';
$lang->forbid         = '禁用';
$lang->activate       = '激活';
$lang->view           = '查看';
$lang->more           = '更多';
$lang->actions        = '操作';
$lang->history        = '历史记录';
$lang->reverse        = '切换顺序';
$lang->switchDisplay  = '切换显示';
$lang->feature        = '未来';
$lang->year           = '年';
$lang->loading        = '稍候...';
$lang->saveSuccess    = '保存成功';
$lang->setSuccess     = '设置成功';
$lang->sendSuccess    = '发送成功';
$lang->fail           = '失败';
$lang->noResultsMatch = '没有匹配的选项';
$lang->alias          = '搜索引擎优化使用，可使用英文、数字';
$lang->unfold         = '+';
$lang->fold           = '-';
$lang->files          = '附件';
$lang->comment        = '备注';

/* Items for lifetime. */
$lang->lifetime = new stdclass();
$lang->lifetime->createdBy    = '由谁创建';
$lang->lifetime->assignedTo   = '指派给';
$lang->lifetime->signedBy     = '由谁签约';
$lang->lifetime->closedBy     = '由谁关闭';
$lang->lifetime->closedReason = '关闭原因';
$lang->lifetime->lastEdited   = '最后修改';

/* Items for javascript. */
$lang->js = new stdclass();
$lang->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->js->deleteing     = '删除中';
$lang->js->doing         = '处理中';
$lang->js->timeout       = '网络超时,请重试';

/* Contact fields*/
$lang->company = new stdclass();
$lang->company->contactUs = '联系我们';
$lang->company->address   = '地址';
$lang->company->phone     = '电话';
$lang->company->email     = 'Email';
$lang->company->fax       = '传真';
$lang->company->qq        = 'QQ';
$lang->company->weibo     = '微博';
$lang->company->weixin    = '微信';
$lang->company->wangwang  = '旺旺';

/* The main menus. */
$lang->menu = new stdclass();

$lang->index   = new stdclass();
$lang->user    = new stdclass();
$lang->file    = new stdclass();
$lang->admin   = new stdclass();
$lang->tree    = new stdclass();
$lang->mail    = new stdclass();
$lang->dept    = new stdclass();
$lang->thread  = new stdclass();
$lang->block   = new stdclass();
$lang->action  = new stdclass();
$lang->effort  = new stdclass();
$lang->setting = new stdclass();
$lang->task    = new stdclass();

$lang->menu->sys = new stdclass();
$lang->menu->sys->company   = '公司|company|setbasic|';
$lang->menu->sys->user      = '组织|user|admin|';
$lang->menu->sys->group     = '权限|group|browse|';
$lang->menu->sys->entry     = '应用|entry|admin|';
$lang->menu->sys->system    = '系统|mail|admin|';
//$lang->menu->sys->extension = '扩展|extension|admin|';
 
$lang->message = new stdclass(); 
$lang->blog    = new stdclass(); 
$lang->group   = new stdclass(); 

/* Menu entry. */
$lang->entry       = new stdclass();
$lang->entry->menu = new stdclass();
$lang->entry->menu->admin  = array('link' => '应用列表|entry|admin|', 'alias' => 'edit');
$lang->entry->menu->create = '添加应用|entry|create|';

/* Menu of company module. */
$lang->company->menu = new stdclass();
$lang->company->menu->basic   = '公司信息|company|setbasic|';

/* Menu system. */
$lang->system       = new stdclass();
$lang->system->menu = new stdclass();
$lang->system->menu->main = array('link' => '发信|mail|admin|', 'alias' => 'detect,edit,save,test');
//$lang->system->menu->backup = '备份|admin|backup|';

$lang->article = new stdclass();
$lang->article->menu = new stdclass();
$lang->article->menu->admin  = '浏览|article|admin|';
$lang->article->menu->tree   = '模块|tree|browse|type=article';
$lang->article->menu->create = array('link' => '添加文章|article|create|type=article', 'alias' => 'edit');

$lang->menuGroups = new stdclass();

/* Menu of mail module. */
$lang->mail = new stdclass();
$lang->mail->menu = $lang->system->menu;
$lang->menuGroups->mail = 'system';

/* The error messages. */
$lang->error = new stdclass();
$lang->error->length       = array('<strong>%s</strong>长度错误，应当为<strong>%s</strong>', '<strong>%s</strong>长度应当不超过<strong>%s</strong>，且不小于<strong>%s</strong>。');
$lang->error->reg          = '<strong>%s</strong>不符合格式，应当为:<strong>%s</strong>。';
$lang->error->unique       = '<strong>%s</strong>已经有<strong>%s</strong>这条记录了。';
$lang->error->notempty     = '<strong>%s</strong>不能为空。';
$lang->error->empty        = "『%s』必须为空。";
$lang->error->equal        = '<strong>%s</strong>必须为<strong>%s</strong>。';
$lang->error->gt           = "『%s』应当大于『%s』。";
$lang->error->ge           = "『%s』应当不小于『%s』。";
$lang->error->lt           = "『%s』应当小于『%s』。";
$lang->error->le           = "『%s』应当不大于『%s』。";
$lang->error->in           = '<strong>%s</strong>必须为<strong>%s</strong>。';
$lang->error->int          = array('<strong>%s</strong>应当是数字。', '<strong>%s</strong>最小值为%s',  '<strong>%s</strong>应当介于<strong>%s-%s</strong>之间。');
$lang->error->float        = '<strong>%s</strong>应当是数字，可以是小数。';
$lang->error->email        = '<strong>%s</strong>应当为合法的EMAIL。';
$lang->error->URL          = '<strong>%s</strong>应当为合法的URL。';
$lang->error->date         = '<strong>%s</strong>应当为合法的日期。';
$lang->error->code         = '<strong>%s</strong>应当为字母或数字的组合。';
$lang->error->account      = '<strong>%s</strong>应当为字母或数字的组合，至少三位';
$lang->error->passwordsame = '两次密码应当相等。';
$lang->error->passwordrule = '密码应该符合规则，长度至少为六位。';
$lang->error->captcha      = '请输入正确的验证码。';
$lang->error->noWritable   = '%s 可能不可写，请修改权限！';

/* The pager items. */
$lang->pager = new stdclass();
$lang->pager->noRecord  = '暂时没有记录。';
$lang->pager->digest    = '共 <strong>%s</strong> 条记录，每页 <strong>%s</strong> 条，页面：<strong>%s/%s</strong> ';
$lang->pager->first     = '首页';
$lang->pager->pre       = '上页';
$lang->pager->next      = '下页';
$lang->pager->last      = '末页';
$lang->pager->locate    = 'Go!';

$lang->date = new stdclass();
$lang->date->minute = '分钟';
$lang->date->day    = '天';

/* The datetime settings. */
define('DT_DATETIME1',  'Y-m-d H:i:s');
define('DT_DATETIME2',  'y-m-d H:i');
define('DT_MONTHTIME1', 'n/d H:i');
define('DT_MONTHTIME2', 'n月d日 H:i');
define('DT_DATE1',      'Y-m-d');
define('DT_DATE2',      'Ymd');
define('DT_DATE3',      'Y年m月d日');
define('DT_DATE4',      'n月j日');
define('DT_TIME1',      'H:i:s');
define('DT_TIME2',      'H:i');
