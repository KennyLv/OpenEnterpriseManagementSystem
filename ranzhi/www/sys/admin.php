<?php
/**
 * The admin router file of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     RanZhi
 * @version     $Id: admin.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
/* Turn off error reporting first. */
//error_reporting(0);

/* Start output buffer. */
ob_start();

/* Define the run mode as admin. */
define('RUN_MODE', 'admin');

/* Load the framework. */
include '../../framework/router.class.php';
include '../../framework/control.class.php';
include '../../framework/model.class.php';
include '../../framework/helper.class.php';

/* Log the time. */
$startTime = getTime();

/* Instance the app. */
$app = router::createApp('sys');

/* Change the request settings. */
$config = $app->config;
$config->frontRequestType = $config->requestType;
$config->requestType = 'GET';
$config->default->module = 'admin'; 
$config->default->method = 'index';

/* Run it. */
$common = $app->loadCommon();
$app->parseRequest();
$common->checkPriv();
$app->loadModule();

/* Flush the buffer. */
echo helper::removeUTF8Bom(ob_get_clean());
