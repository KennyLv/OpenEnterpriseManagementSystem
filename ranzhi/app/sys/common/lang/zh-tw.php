<?php
/**
 * The zh-tw file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: zh-tw.php 9920 2014-06-13 07:37:07Z guanxiying $
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
$lang->apps->crm  = '客戶';
$lang->apps->cash = '財務';
$lang->apps->oa   = '辦公';
$lang->apps->sys  = '通用';
$lang->apps->team = '團隊';

/* Lang items for ranzhi. */
$lang->ranzhi  = '然之協同';
$lang->poweredBy = "<span id='poweredBy'><a href='http://www.ranzhi.org/?v=%s' target='_blank'>{$lang->ranzhi}%s</a></span>";

/* IE6 alert.  */
$lang->IE6Alert= <<<EOT
    <div class='alert alert-danger' style='margin-top:100px;'>
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h2>請使用其他瀏覽器訪問本站。</h2>
      <p>珍愛上網，遠離IE！</p>
      <p>我們檢測到您正在使用Internet Explorer 6 ——  IE6 瀏覽器, IE6 于2001年8月27日推出，而現在它已十分脫節。速度慢、不安全、不能很好的展示新一代網站。<br/></p>
      <a href='https://www.google.com/intl/zh-hk/chrome/browser/' class='btn btn-primary btn-lg' target='_blank'>谷歌瀏覽器</a>
      <a href='http://www.firefox.com/' class='btn btn-primary btn-lg' target='_blank'>火狐瀏覽器</a>
      <a href='http://www.opera.com/download' class='btn btn-primary btn-lg' target='_blank'>Opera瀏覽器</a>
      <p></p>
    </div>
EOT;

/* Global lang items. */
$lang->home           = '首頁';
$lang->welcome        = '歡迎您，<strong>%s</strong>！';
$lang->messages       = "<strong><i class='icon-comment-alt'></i> %s</strong>";
$lang->todayIs        = '今天是%s，';
$lang->aboutUs        = '關於我們';
$lang->about          = '關於';
$lang->link           = '友情連結';
$lang->frontHome      = '前台';
$lang->forumHome      = '論壇';
$lang->bookHome       = '手冊';
$lang->dashboard      = '成員中心';
$lang->register       = '註冊';
$lang->logout         = '退出';
$lang->login          = '登錄';
$lang->account        = '帳號';
$lang->password       = '密碼';
$lang->changePassword = '修改密碼';
$lang->currentPos     = '當前位置';
$lang->categoryMenu   = '分類導航';
$lang->basicInfo      = '基本信息';

/* Global action items. */
$lang->reset          = '重填';
$lang->add            = '添加';
$lang->edit           = '編輯';
$lang->copy           = '複製';
$lang->and            = '並且';
$lang->or             = '或者';
$lang->hide           = '隱藏';
$lang->delete         = '刪除';
$lang->close          = '關閉';
$lang->finish         = '完成';
$lang->cancel         = '取消';
$lang->save           = '保存';
$lang->confirm        = '確認';
$lang->preview        = '預覽';
$lang->goback         = '返回';
$lang->search         = '搜索';
$lang->assign         = '指派';
$lang->create         = '新建';
$lang->forbid         = '禁用';
$lang->activate       = '激活';
$lang->view           = '查看';
$lang->more           = '更多';
$lang->actions        = '操作';
$lang->history        = '歷史記錄';
$lang->reverse        = '切換順序';
$lang->switchDisplay  = '切換顯示';
$lang->feature        = '未來';
$lang->year           = '年';
$lang->loading        = '稍候...';
$lang->saveSuccess    = '保存成功';
$lang->setSuccess     = '設置成功';
$lang->sendSuccess    = '發送成功';
$lang->fail           = '失敗';
$lang->noResultsMatch = '沒有匹配的選項';
$lang->alias          = '搜索引擎優化使用，可使用英文、數字';
$lang->unfold         = '+';
$lang->fold           = '-';
$lang->files          = '附件';
$lang->comment        = '備註';

/* Items for lifetime. */
$lang->lifetime = new stdclass();
$lang->lifetime->createdBy    = '由誰創建';
$lang->lifetime->assignedTo   = '指派給';
$lang->lifetime->signedBy     = '由誰簽約';
$lang->lifetime->closedBy     = '由誰關閉';
$lang->lifetime->closedReason = '關閉原因';
$lang->lifetime->lastEdited   = '最後修改';

/* Items for javascript. */
$lang->js = new stdclass();
$lang->js->confirmDelete = '您確定要執行刪除操作嗎？';
$lang->js->deleteing     = '刪除中';
$lang->js->doing         = '處理中';
$lang->js->timeout       = '網絡超時,請重試';

/* Contact fields*/
$lang->company = new stdclass();
$lang->company->contactUs = '聯繫我們';
$lang->company->address   = '地址';
$lang->company->phone     = '電話';
$lang->company->email     = 'Email';
$lang->company->fax       = '傳真';
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
$lang->menu->sys->user      = '組織|user|admin|';
$lang->menu->sys->group     = '權限|group|browse|';
$lang->menu->sys->entry     = '應用|entry|admin|';
$lang->menu->sys->system    = '系統|mail|admin|';
//$lang->menu->sys->extension = '擴展|extension|admin|';
 
$lang->message = new stdclass(); 
$lang->blog    = new stdclass(); 
$lang->group   = new stdclass(); 

/* Menu entry. */
$lang->entry       = new stdclass();
$lang->entry->menu = new stdclass();
$lang->entry->menu->admin  = array('link' => '應用列表|entry|admin|', 'alias' => 'edit');
$lang->entry->menu->create = '添加應用|entry|create|';

/* Menu of company module. */
$lang->company->menu = new stdclass();
$lang->company->menu->basic   = '公司信息|company|setbasic|';

/* Menu system. */
$lang->system       = new stdclass();
$lang->system->menu = new stdclass();
$lang->system->menu->main = array('link' => '發信|mail|admin|', 'alias' => 'detect,edit,save,test');
//$lang->system->menu->backup = '備份|admin|backup|';

$lang->article = new stdclass();
$lang->article->menu = new stdclass();
$lang->article->menu->admin  = '瀏覽|article|admin|';
$lang->article->menu->tree   = '模組|tree|browse|type=article';
$lang->article->menu->create = array('link' => '添加文章|article|create|type=article', 'alias' => 'edit');

$lang->menuGroups = new stdclass();

/* Menu of mail module. */
$lang->mail = new stdclass();
$lang->mail->menu = $lang->system->menu;
$lang->menuGroups->mail = 'system';

/* The error messages. */
$lang->error = new stdclass();
$lang->error->length       = array('<strong>%s</strong>長度錯誤，應當為<strong>%s</strong>', '<strong>%s</strong>長度應當不超過<strong>%s</strong>，且不小於<strong>%s</strong>。');
$lang->error->reg          = '<strong>%s</strong>不符合格式，應當為:<strong>%s</strong>。';
$lang->error->unique       = '<strong>%s</strong>已經有<strong>%s</strong>這條記錄了。';
$lang->error->notempty     = '<strong>%s</strong>不能為空。';
$lang->error->empty        = "『%s』必須為空。";
$lang->error->equal        = '<strong>%s</strong>必須為<strong>%s</strong>。';
$lang->error->gt           = "『%s』應當大於『%s』。";
$lang->error->ge           = "『%s』應當不小於『%s』。";
$lang->error->lt           = "『%s』應當小於『%s』。";
$lang->error->le           = "『%s』應當不大於『%s』。";
$lang->error->in           = '<strong>%s</strong>必須為<strong>%s</strong>。';
$lang->error->int          = array('<strong>%s</strong>應當是數字。', '<strong>%s</strong>最小值為%s',  '<strong>%s</strong>應當介於<strong>%s-%s</strong>之間。');
$lang->error->float        = '<strong>%s</strong>應當是數字，可以是小數。';
$lang->error->email        = '<strong>%s</strong>應當為合法的EMAIL。';
$lang->error->URL          = '<strong>%s</strong>應當為合法的URL。';
$lang->error->date         = '<strong>%s</strong>應當為合法的日期。';
$lang->error->code         = '<strong>%s</strong>應當為字母或數字的組合。';
$lang->error->account      = '<strong>%s</strong>應當為字母或數字的組合，至少三位';
$lang->error->passwordsame = '兩次密碼應當相等。';
$lang->error->passwordrule = '密碼應該符合規則，長度至少為六位。';
$lang->error->captcha      = '請輸入正確的驗證碼。';
$lang->error->noWritable   = '%s 可能不可寫，請修改權限！';

/* The pager items. */
$lang->pager = new stdclass();
$lang->pager->noRecord  = '暫時沒有記錄。';
$lang->pager->digest    = '共 <strong>%s</strong> 條記錄，每頁 <strong>%s</strong> 條，頁面：<strong>%s/%s</strong> ';
$lang->pager->first     = '首頁';
$lang->pager->pre       = '上頁';
$lang->pager->next      = '下頁';
$lang->pager->last      = '末頁';
$lang->pager->locate    = 'Go!';

$lang->date = new stdclass();
$lang->date->minute = '分鐘';
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
