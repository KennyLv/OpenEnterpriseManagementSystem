<?php
/**
 * The common simplified chinese file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     chanzhiEPS
 * @version     $Id$
 * @link        http://www.zentao.net
 */
/* Common sign setting. */
$lang->colon      = '：';
$lang->prev       = '‹';
$lang->next       = '›';
$lang->laquo      = '&laquo;';
$lang->raquo      = '&raquo;';
$lang->minus      = ' - ';
$lang->dollarSign = '￥';
$lang->divider    = "<span class='divider'>{$lang->raquo}</span> ";
$lang->back2Top   = '返回顶部';

/* Lang items for xirang. */
$lang->chanzhiEPS       = '蝉知企业门户系统';
$lang->chanzhiEPSx      = '蝉知';
$lang->agreement        = "已阅读并同意<a href='http://api.chanzhi.org/goto.php?item=license' target='_blank'>《蝉知企业门户系统使用协议》</a>";
$lang->poweredBy        = " <span id='poweredBy'><a href='http://www.chanzhi.org/?v=%s' target='_blank' title='%s'>{$lang->chanzhiEPSx} %s</a></span>";
$lang->newVersion       = "提示：蝉知系统已于 <span id='releaseDate'></span> 发布 <span id='version'></span>版本。<a href='' target='_blank' id='upgradeLink'>马上下载</a>";

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
$lang->link           = '友情链接';
$lang->frontHome      = '前台';
$lang->forumHome      = '论坛';
$lang->bookHome       = '手册';
$lang->dashboard      = '用户中心';
$lang->register       = '注册';
$lang->logout         = '退出';
$lang->login          = '登录';
$lang->account        = '帐号';
$lang->password       = '密码';
$lang->changePassword = '修改密码';
$lang->forgotPassword = '忘记密码?';
$lang->currentPos     = '当前位置';
$lang->categoryMenu   = '分类导航';
$lang->wechatTip      = '微信订阅';
$lang->qrcodeTip      = '移动访问';
   
/* Global action items. */
$lang->reset          = '重置';
$lang->edit           = '编辑';
$lang->copy           = '复制';
$lang->hide           = '隐藏';
$lang->delete         = '删除';
$lang->close          = '关闭';
$lang->save           = '保存';
$lang->confirm        = '确认';
$lang->preview        = '预览';
$lang->goback         = '返回';
$lang->search         = '搜索';
$lang->more           = '更多';
$lang->actions        = '操作';
$lang->feature        = '未来';
$lang->year           = '年';
$lang->loading        = '稍候...';
$lang->saveSuccess    = '保存成功';
$lang->setSuccess     = '设置成功';
$lang->sendSuccess    = '发送成功';
$lang->deleteSuccess  = '删除成功';
$lang->fail           = '失败';
$lang->noResultsMatch = '没有匹配的选项';
$lang->alias          = '搜索引擎优化使用，可使用英文或数字';

/* Items for javascript. */
$lang->js = new stdclass();
$lang->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->js->deleteing     = '删除中';
$lang->js->doing         = '处理中';
$lang->js->loading       = '加载中';
$lang->js->timeout       = '网络超时,请重试';

/* Contact fields*/
$lang->company = new stdclass();
$lang->company->contactUs = '联系我们';
$lang->company->contacts  = '联系人';
$lang->company->address   = '地址';
$lang->company->phone     = '电话';
$lang->company->email     = 'Email';
$lang->company->fax       = '传真';
$lang->company->qq        = 'QQ';
$lang->company->weibo     = '微博';
$lang->company->weixin    = '微信';
$lang->company->wangwang  = '旺旺';

/* Sitemap settings. */
$lang->sitemap = new stdclass();
$lang->sitemap->common = '站点地图';

/* The main menus. */
$lang->menu = new stdclass();
$lang->menu->admin    = '首页|admin|index|';
$lang->menu->article  = '文章|article|admin|';
$lang->menu->blog     = '博客|article|admin|type=blog';
$lang->menu->product  = '产品|product|admin|';
$lang->menu->book     = '手册|book|admin|';
$lang->menu->page     = '单页|article|admin|type=page';
$lang->menu->forum    = '论坛|forum|admin|';
$lang->menu->site     = '站点|site|setbasic|';
$lang->menu->ui       = '界面|ui|setlogo|';
$lang->menu->company  = '公司|company|setbasic|';
$lang->menu->user     = '会员|user|admin|';
$lang->menu->feedback = '反馈|message|admin|';

/* Menu groups setting. */
$lang->menuGroups = new stdclass();
$lang->menuGroups->tag     = 'site';
$lang->menuGroups->mail    = 'site';
$lang->menuGroups->nav     = 'site';
$lang->menuGroups->links   = 'site';
$lang->menuGroups->wechat  = 'site';
$lang->menuGroups->block   = 'ui';
$lang->menuGroups->slide   = 'ui';
$lang->menuGroups->tree    = 'article';
$lang->menuGroups->message = 'feedback';

/* Menu of article module. */
$lang->article = new stdclass();
$lang->article->menu = new stdclass();
$lang->article->menu->browse = array('link' => '文章列表|article|admin|', 'alias' => 'create, edit');
$lang->article->menu->tree   = '类目管理|tree|browse|type=article';

/* Menu of blog module. */
$lang->blog = new stdclass();
$lang->blog->menu = new stdclass();
$lang->blog->menu->browse = array('link' => '博客列表|article|admin|type=blog', 'alias' => 'create, edit');
$lang->blog->menu->tree   = '类目管理|tree|browse|type=blog';

/* Menu of page module. */
$lang->page = new stdclass();
$lang->page->menu = new stdclass();
$lang->page->menu->browse = array('link' => '单页列表|article|admin|type=page', 'alias' => 'edit');
$lang->page->menu->create = '添加单页|article|create|type=page';

/* Menu of product module. */
$lang->product = new stdclass();
$lang->product->menu = new stdclass();
$lang->product->menu->browse = array('link' => '产品列表|product|admin|', 'alias' => 'create, edit');
$lang->product->menu->tree   = '类目管理|tree|browse|type=product';

/* Menu of UI module. */
$lang->ui = new stdclass();
$lang->ui->menu = new stdclass();
$lang->ui->menu->logo    = 'LOGO设置|ui|setlogo|';
$lang->ui->menu->favicon = '网站图标|ui|setfavicon|';
$lang->ui->menu->theme   = '主题风格|ui|settheme|';
$lang->ui->menu->slide   = array('link' => '幻灯片设置|slide|admin|', 'alias' => 'create,edit');
$lang->ui->menu->admin   = array('link' => '区块管理|block|admin|', 'alias' => 'create,edit');
$lang->ui->menu->pages   = array('link' => '布局设置|block|pages|', 'alias' => 'setregion');

/* Menu of user module. */
$lang->user = new stdclass();
$lang->user->menu = new stdclass();
$lang->user->menu->all    = '全部会员|user|admin|';
$lang->user->menu->sina   = '微博会员|user|admin|provider=sina';
$lang->user->menu->wechat = '微信会员|user|admin|provider=wechat';
$lang->user->menu->qq     = 'QQ会员|user|admin|provider=qq';

/* Menu of comment module. */
$lang->feedback = new stdclass();
$lang->feedback->menu = new stdclass();
$lang->feedback->menu->message = '留言|message|admin|type=message';
$lang->feedback->menu->comment = '评论|message|admin|type=comment';
$lang->feedback->menu->thread  = '主题|forum|admin|tab=feedback';
$lang->feedback->menu->reply   = '回帖|reply|admin|order=id_desc&tab=feedback';
$lang->feedback->menu->wechat  = '微信|wechat|message|mode=replied&replied=0';

$lang->message = new stdclass();
$lang->message->menu = $lang->feedback->menu;

/* Menu of forum module. */
$lang->forum = new stdclass();
$lang->forum->menu = new stdclass();
$lang->forum->menu->browse = '主题列表|forum|admin|';
$lang->forum->menu->reply  = '回帖列表|reply|admin|';
$lang->forum->menu->tree   = '版块管理|tree|browse|type=forum';
$lang->forum->menu->update = '更新数据|forum|update|';

/* Menu of site module. */
$lang->site = new stdclass();
$lang->site->menu = new stdclass();
$lang->site->menu->basic     = '站点设置|site|setbasic|';
$lang->site->menu->nav       = '导航设置|nav|admin|';
$lang->site->menu->tag       = '关键词设置|tag|admin|';
$lang->site->menu->oauth     = '开放登录|site|setoauth|';
$lang->site->menu->link      = '友情链接|links|admin|';
$lang->site->menu->mail      = array('link' => '发信设置|mail|admin|', 'alias' => 'detect,edit,save,test');
$lang->site->menu->wechat    = array('link' => '微信设置|wechat|admin|', 'alias' => 'create, edit, adminresponse');

/* Menu of company module. */
$lang->company->menu = new stdclass();
$lang->company->menu->basic   = '公司信息|company|setbasic|';
$lang->company->menu->contact = '联系方式|company|setcontact|';

/* Menu of tree module. */
$lang->tree = new stdclass();
$lang->tree->menu = $lang->article->menu;

/* Menu of tag module. */
$lang->tag = new stdclass();
$lang->tag->menu = $lang->site->menu;

/* Menu of mail module. */
$lang->mail = new stdclass();
$lang->mail->menu = $lang->site->menu;

/* Menu of reply module. */
$lang->reply = new stdclass();
$lang->reply->menu = $lang->forum->menu;

/* Menu of wechat module. */
$lang->wechat = new stdclass();
$lang->wechat->menu = $lang->site->menu;

/* Menu of nav module. */
$lang->nav = new stdclass();
$lang->nav->menu = $lang->site->menu;

/* Menu of tree module. */
$lang->slide = new stdclass();
$lang->slide->menu = $lang->ui->menu;

/* Menu of block module. */
$lang->block = new stdclass();
$lang->block->menu = $lang->ui->menu;

/* Menu of tree module. */
$lang->links = new stdclass();
$lang->links->menu = $lang->site->menu;

/* The error messages. */
$lang->error = new stdclass();
$lang->error->length       = array('<strong>%s</strong>长度错误，应当为<strong>%s</strong>', '<strong>%s</strong>长度应当不超过<strong>%s</strong>，且不小于<strong>%s</strong>。');
$lang->error->reg          = '<strong>%s</strong>不符合格式，应当为:<strong>%s</strong>。';
$lang->error->unique       = '<strong>%s</strong>已经有<strong>%s</strong>这条记录了。';
$lang->error->notempty     = '<strong>%s</strong>不能为空。';
$lang->error->equal        = '<strong>%s</strong>必须为<strong>%s</strong>。';
$lang->error->gt           = "<strong>%s</strong>应当大于<strong>%s</strong>。";
$lang->error->ge           = "<strong>%s</strong>应当不小于<strong>%s</strong>。";
$lang->error->lt           = "<strong>%s</strong>应当小于<strong>%s</strong>。";
$lang->error->le           = "<strong>%s</strong>应当不大于<strong>%s</strong>。";
$lang->error->in           = '<strong>%s</strong>必须为<strong>%s</strong>。';
$lang->error->int          = array('<strong>%s</strong>应当是数字。', '<strong>%s</strong>最小值为%s',  '<strong>%s</strong>应当介于<strong>%s-%s</strong>之间。');
$lang->error->float        = '<strong>%s</strong>应当是数字，可以是小数。';
$lang->error->email        = '<strong>%s</strong>应当为合法的EMAIL。';
$lang->error->URL          = '<strong>%s</strong>应当为合法的URL。';
$lang->error->date         = '<strong>%s</strong>应当为合法的日期。';
$lang->error->account      = '<strong>%s</strong>应当为字母和数字的组合，至少三位';
$lang->error->passwordsame = '两次密码应当相等。';
$lang->error->passwordrule = '密码应该符合规则，长度至少为六位。';
$lang->error->captcha      = '请输入正确的验证码。';
$lang->error->noWritable   = '%s 可能不可写，请修改权限！';
$lang->error->token        = '必须为英文或数字，长度为3-32字符！';

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
define('DT_DATE1',     'Y年m月d日');
define('DT_DATE2',     'Ymd');
define('DT_DATE3',     'Y年m月d日');
define('DT_DATE4',     'Y-m-d');
define('DT_TIME1',     'H:i:s');
define('DT_TIME2',     'H:i');

/* Keywords for chanzhi. */
$lang->k  = '蝉知门户，开源免费的企业建站系统!;';
$lang->k .= '蝉知门户，开源免费的cms!;';
$lang->k .= '蝉知门户，免费建站首选！;';
$lang->k .= '蝉知门户，企业网站建设专家！;';
$lang->k .= '蝉知门户，开源php企业建站系统！;';
$lang->k .= '蝉知门户，微网站专家！;';
$lang->k .= '蝉知门户，微网站首选！;';
$lang->k .= '蝉知门户，微信营销首选！';
