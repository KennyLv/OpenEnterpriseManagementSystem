<?php
/**
 * The site module zh-tw file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青島息壤網絡信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->site->common        = "站點";

$lang->site->type          = '站點類型';
$lang->site->name          = '網站名稱';
$lang->site->module        = '功能模組';
$lang->site->lang          = '語言';
$lang->site->domain        = '網站域名';
$lang->site->keywords      = '關鍵詞';
$lang->site->indexKeywords = '首頁關鍵詞';
$lang->site->desc          = '站點描述';
$lang->site->icp           = '備案編號';
$lang->site->slogan        = '站點口號';
$lang->site->mission       = '站點使命';
$lang->site->copyright     = '創建年份';

$lang->site->setBasic      = "設置基本信息";
$lang->site->setOauth      = "開放登錄設置";
$lang->site->setSinaOauth  = "新浪微博接入";
$lang->site->setQQOauth    = "QQ接入";
$lang->site->oauthHelp     = "使用幫助";

$lang->site->typeList = new stdclass();
$lang->site->typeList->company = '企業門戶';
$lang->site->typeList->blog    = '個人網站';

$lang->site->moduleAvailable = array();
$lang->site->moduleAvailable['user']    = '會員';
$lang->site->moduleAvailable['forum']   = '論壇';
$lang->site->moduleAvailable['blog']    = '博客';
$lang->site->moduleAvailable['book']    = '手冊';
$lang->site->moduleAvailable['message'] = '評論留言';
