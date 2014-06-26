<?php
/**
 * The loader of framework of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     RanZhi
 * @version     $Id: loader.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
/* Set the error reporting. */
error_reporting(E_ALL);

/* Start output buffer. */
ob_start();

/* Define the run mode as front. */
define('RUN_MODE', 'front');

/* Load the framework. */
$frameworkRoot = dirname(__FILE__);
include "$frameworkRoot/router.class.php";
include "$frameworkRoot/control.class.php";
include "$frameworkRoot/model.class.php";
include "$frameworkRoot/helper.class.php";

/* Log the time and define the run mode. */
$startTime = getTime();

/* Run the app. */
$app = router::createApp($appName);
$common = $app->loadCommon();
$app->parseRequest();
$common->checkPriv();
$app->loadModule();

/* Flush the buffer. */
echo helper::removeUTF8Bom(ob_get_clean());
