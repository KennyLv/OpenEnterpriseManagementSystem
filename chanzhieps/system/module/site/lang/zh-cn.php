<?php
/**
 * The site module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->site->common        = "站点";

$lang->site->type          = '站点类型';
$lang->site->name          = '网站名称';
$lang->site->module        = '功能模块';
$lang->site->lang          = '语言';
$lang->site->domain        = '网站域名';
$lang->site->keywords      = '关键词';
$lang->site->indexKeywords = '首页关键词';
$lang->site->desc          = '站点描述';
$lang->site->icp           = '备案编号';
$lang->site->slogan        = '站点口号';
$lang->site->mission       = '站点使命';
$lang->site->copyright     = '创建年份';

$lang->site->setBasic      = "设置基本信息";
$lang->site->setOauth      = "开放登录设置";
$lang->site->setSinaOauth  = "新浪微博接入";
$lang->site->setQQOauth    = "QQ接入";
$lang->site->oauthHelp     = "使用帮助";

$lang->site->typeList = new stdclass();
$lang->site->typeList->portal = '企业门户';
$lang->site->typeList->blog   = '个人博客';

$lang->site->moduleAvailable = array();
$lang->site->moduleAvailable['user']    = '会员';
$lang->site->moduleAvailable['forum']   = '论坛';
$lang->site->moduleAvailable['blog']    = '博客';
$lang->site->moduleAvailable['book']    = '手册';
$lang->site->moduleAvailable['message'] = '评论留言';
