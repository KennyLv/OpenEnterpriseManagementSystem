<?php
/**
 * The loader file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     chanzhiEPS
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */

/* Set systemRoot */
//$systemRoot = '';                                                                 // User can define the systemRoot manually.
if(!isset($systemRoot))  $systemRoot = dirname(__FILE__) . '/system/';              // Not set, use  www/system as default.
if(!is_dir($systemRoot)) $systemRoot = dirname(dirname(__FILE__)) . '/system/';     // Last, try ../system.
if(!is_dir($systemRoot)) die('system not found! Please check it.');                 // Die.

/* Load the framework. */
$frameworkRoot = $systemRoot . 'framework/';
include $frameworkRoot . 'router.class.php';
include $frameworkRoot . 'control.class.php';
include $frameworkRoot . 'model.class.php';
include $frameworkRoot . 'helper.class.php';
include $frameworkRoot . 'seo.class.php';
