<?php
/**
 * The nav config file of chanzhiEPS. 
 * 
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan
 * @package     nav
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$config->nav->system = new stdclass();

$config->nav->system->home    = $config->webRoot;
$config->nav->system->company = commonModel::createFrontLink('company', 'index');
$config->nav->system->forum   = commonModel::createFrontLink('forum', 'index');
$config->nav->system->blog    = commonModel::createFrontLink('blog', 'index');
$config->nav->system->book    = commonModel::createFrontLink('book', 'index');
$config->nav->system->message = commonModel::createFrontLink('message', 'index');
