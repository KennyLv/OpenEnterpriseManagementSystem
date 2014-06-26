<?php
/**
 * The English file of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: en.php 9914 2014-06-13 06:29:44Z daitingting $
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
$lang->at      = ' At ';
$lang->by      = ' By ';
$lang->ditto   = 'Ditto';
$lang->submitting   = 'Saving...';

/* Apps lang items.*/
$lang->apps = new stdclass();
$lang->apps->crm  = 'CRM';
$lang->apps->cash = 'CASH';
$lang->apps->oa   = 'OA';
$lang->apps->sys  = 'SYSTEM';
$lang->apps->team = 'TEAM';

/* Lang items for ranzhi. */
$lang->ranzhi  = 'ranzhi';
$lang->poweredBy = "<a href='http://www.ranzhi.org/?v=%s' target='_blank'>{$lang->ranzhi} %s</a>";

/* IE6 alert.  */
$lang->IE6Alert= <<<EOT
    <div class='alert alert-danger' style='margin-top:100px;'>
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h2>Please use IE(>8), firefox, chrome, safari, opera to visit this site.</h2>
      <p>Stop using IE6!</p>
      <p>IE6 is too old, we should stop using it. <br/></p>
      <a href='https://www.google.com/intl/zh-hk/chrome/browser/' class='btn btn-primary btn-lg' target='_blank'>Chrome</a>
      <a href='http://www.firefox.com/' class='btn btn-primary btn-lg' target='_blank'>Firefox</a>
      <a href='http://www.opera.com/download' class='btn btn-primary btn-lg' target='_blank'>Opera</a>
      <p></p>
    </div>
EOT;

/* Global lang items. */
$lang->home           = 'Home';
$lang->welcome        = 'Welcome, <strong>%s</strong>!';
$lang->messages       = "<strong><i class='icon-comment-alt'></i> %s</strong>";
$lang->todayIs        = 'Today is %s, ';
$lang->aboutUs        = 'About';
$lang->about          = 'About';
$lang->link           = 'Links';
$lang->frontHome      = 'Front';
$lang->forumHome      = 'Forum';
$lang->bookHome       = 'Book';
$lang->dashboard      = 'Dashboard';
$lang->register       = 'Register';
$lang->logout         = 'Logout';
$lang->login          = 'Login';
$lang->account        = 'Account';
$lang->password       = 'Password';
$lang->changePassword = 'Change password';
$lang->currentPos     = 'Positon';
$lang->categoryMenu   = 'Categories';
$lang->basicInfo      = 'Basic Info';

/* Global action items. */
$lang->reset          = 'Reset';
$lang->add            = 'Add';
$lang->edit           = 'Edit';
$lang->copy           = 'Copy';
$lang->and            = 'And';
$lang->or             = 'Or';
$lang->hide           = 'Hide';
$lang->delete         = 'Delete';
$lang->close          = 'Close';
$lang->finish         = 'Finish';
$lang->cancel         = 'Cancel';
$lang->save           = 'Save';
$lang->confirm        = 'Confirm';
$lang->preview        = 'Preview';
$lang->goback         = 'Back';
$lang->search         = 'Search';
$lang->assign         = 'Assign';
$lang->create         = 'Add';
$lang->forbid         = 'Forbid';
$lang->activate       = 'Activate';
$lang->view           = 'View';
$lang->more           = 'More';
$lang->actions        = 'Actions';
$lang->history        = 'History';
$lang->reverse        = 'Reverse';
$lang->switchDisplay  = 'Switching Display';
$lang->feature        = 'Feature';
$lang->year           = 'Year';
$lang->loading        = 'Loading...';
$lang->saveSuccess    = 'Successfully saved.';
$lang->setSuccess     = 'Successfully saved.';
$lang->sendSuccess    = 'Successfully sended.';
$lang->fail           = 'Fail';
$lang->noResultsMatch = 'No matched results.';
$lang->alias          = 'for seo, can use numbers, letters and words';
$lang->unfold         = '+';
$lang->fold           = '-';
$lang->files          = 'Files';
$lang->comment        = 'Comment';

/* Items for lifetime. */
$lang->lifetime = new stdclass();
$lang->lifetime->createdBy    = 'Create By';
$lang->lifetime->assignedTo   = 'Assigned to';
$lang->lifetime->signedBy     = 'Signed By';
$lang->lifetime->closedBy     = 'Closed By';
$lang->lifetime->closedReason = 'Closed Reason';
$lang->lifetime->lastEdited   = 'Last Edited';

/* Items for javascript. */
$lang->js = new stdclass();
$lang->js->confirmDelete = 'Are sure to delete it?';
$lang->js->deleteing     = 'Deleting...';
$lang->js->doing         = 'Processing...';
$lang->js->timeout       = 'Timeout';

/* Contact fields*/
$lang->company = new stdclass();
$lang->company->contactUs = 'Contact';
$lang->company->address   = 'Address';
$lang->company->phone     = 'Phone';
$lang->company->email     = 'Email';
$lang->company->fax       = 'Fax';
$lang->company->qq        = 'QQ';
$lang->company->weibo     = 'Weibo';
$lang->company->weixin    = 'Weichat';
$lang->company->wangwang  = 'Wangwang';

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
$lang->menu->sys->company   = 'Company|company|setbasic|';
$lang->menu->sys->user      = 'User|user|admin|';
$lang->menu->sys->group     = 'Priviledge|group|browse|';
$lang->menu->sys->entry     = 'App|entry|admin|';
$lang->menu->sys->system    = 'System|mail|admin|';
//$lang->menu->sys->extension = 'Extension|extension|admin|';
//
$lang->message = new stdclass(); 
$lang->blog    = new stdclass(); 
$lang->group   = new stdclass(); 

/* Menu entry. */
$lang->entry       = new stdclass();
$lang->entry->menu = new stdclass();
$lang->entry->menu->admin  = array('link' => 'Entries|entry|admin|', 'alias' => 'edit');
$lang->entry->menu->create = array('link' => 'Create|entry|create|');

/* Menu of company module. */
$lang->company->menu = new stdclass();
$lang->company->menu->basic   = 'Basic|company|setbasic|';

/* Menu system. */
$lang->system       = new stdclass();
$lang->system->menu = new stdclass();
$lang->system->menu->main = array('link' => 'Mail|mail|admin|', 'alias' => 'detect,edit,save,test');
//$lang->system->menu->backup = '备份|admin|backup|';

$lang->article = new stdclass();
$lang->article->menu = new stdclass();
$lang->article->menu->admin  = 'Browse|article|admin|';
$lang->article->menu->tree   = 'Category|tree|browse|type=article';
$lang->article->menu->create = array('link' => 'Add|article|create|type=article', 'float' => 'right');

$lang->menuGroups = new stdclass();

/* Menu of mail module. */
$lang->mail = new stdclass();
$lang->mail->menu = $lang->system->menu;
$lang->menuGroups->mail = 'system';

/* The error messages. */
$lang->error = new stdclass();
$lang->error->length          = array("<strong>%s</strong>length should be<strong>%s</strong>", "<strong>%s</strong>length should between<strong>%s</strong>and <strong>%s</strong>.");
$lang->error->reg             = "<strong>%s</strong>should like<strong>%s</strong>";
$lang->error->unique          = "<strong>%s</strong>has<strong>%s</strong>already. If you are sure this record has been deleted, you can restore it in admin panel, trash page.";
$lang->error->notempty        = "<strong>%s</strong>can not be empty.";
$lang->error->empty           = "<strong>%s</strong> must be empty.";
$lang->error->equal           = "<strong>%s</strong>must be<strong>%s</strong>.";
$lang->error->gt              = "<strong>%s</strong> should be geater than <strong>%s</strong>.";
$lang->error->ge              = "<strong>%s</strong> should be not less than <strong>%s</strong>.";
$lang->error->lt              = "<strong>%s</strong> should be less than <strong>%s</strong>";
$lang->error->le              = "<strong>%s</strong> should be no greater than <strong>%s</strong>.";
$lang->error->in              = '<strong>%s</strong>must in<strong>%s</strong>。';
$lang->error->int             = array("<strong>%s</strong>should be interger", "<strong>%s</strong>should between<strong>%s-%s</strong>.");
$lang->error->float           = "<strong>%s</strong>should be a interger or float.";
$lang->error->email           = "<strong>%s</strong>should be email.";
$lang->error->URL             = "<strong>%s</strong>should be url.";
$lang->error->date            = "<strong>%s</strong>should be date";
$lang->error->code            = '<strong>%s</strong> should be a combination of letters or numbers.';
$lang->error->account         = "<strong>%s</strong>should be a valid account.";
$lang->error->passwordsame    = "Two passwords must be the same";
$lang->error->passwordrule    = "Password should more than six letters.";
$lang->error->captcha         = 'Captcah wrong.';
$lang->error->noWritable      = '%s maybe not write, please modify permissions!';

/* The pager items. */
$lang->pager = new stdclass();
$lang->pager->noRecord  = "No records yet.";
$lang->pager->digest    = "<strong>%s</strong> records, <strong>%s</strong> per page, <strong>%s/%s</strong> ";
$lang->pager->first     = "First";
$lang->pager->pre       = "Previous";
$lang->pager->next      = "Next";
$lang->pager->last      = "Last";
$lang->pager->locate    = "GO!";

$lang->date = new stdclass();
$lang->date->minute = 'minute';
$lang->date->day    = 'day';

/* Date times. */
define('DT_DATETIME1',  'Y-m-d H:i:s');
define('DT_DATETIME2',  'y-m-d H:i');
define('DT_MONTHTIME1', 'n/d H:i');
define('DT_MONTHTIME2', 'F j, H:i');
define('DT_DATE1',      'Y-m-d');
define('DT_DATE2',      'Ymd');
define('DT_DATE3',      'F j, Y ');
define('DT_DATE4',      'M j');
define('DT_TIME1',      'H:i:s');
define('DT_TIME2',      'H:i');
