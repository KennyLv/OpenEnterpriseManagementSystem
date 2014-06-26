<?php
/**
 * The config file of RanZhi.
 *
 * Don't modify this file directly, copy the item to my.php and change it.
 *
 * @copyright   Copyright 2009-2013 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     config
 * @version     $Id: config.php 9919 2014-06-13 07:36:21Z guanxiying $
 * @link        http://www.ranzhi.org
 */
/* Judge class config and function getWebRoot exists or not, make sure php shells can work. */
if(!class_exists('config')){class config{}}
if(!function_exists('getWebRoot')){function getWebRoot(){}}

/* Basic settings. */
$config = new config();
$config->version      = '1.2.beta';        // The version of ranzhi. Don't change it.
$config->debug        = true;              // Turn debug on or off.
$config->charset      = 'UTF-8';           // The charset of ranzhi.
$config->cookieLife   = time() + 2592000;  // The cookie life time.
$config->timezone     = 'Asia/Shanghai';   // The time zone setting, for more see http://www.php.net/manual/en/timezones.php
$config->cookiePath   = '/';               // The path of cookies.
$config->webRoot      = getWebRoot();      // The web root.
$config->checkVersion = true;              // Auto check for new version or not.

/* The request settings. */
$config->requestType = 'PATH_INFO';       // The request type: PATH_INFO|GET, if PATH_INFO, must use url rewrite.
$config->pathType    = 'clean';           // If the request type is PATH_INFO, the path type.
$config->requestFix  = '-';               // The divider in the url when PATH_INFO.
$config->moduleVar   = 'm';               // requestType=GET: the module var name.
$config->methodVar   = 'f';               // requestType=GET: the method var name.
$config->viewVar     = 't';               // requestType=GET: the view var name.
$config->sessionVar  = 'rid';             // requestType=GET: the session var name.

/* Supported views. */
$config->views = ',html,json,mhtml,'; 

/* Supported languages. */
$config->langs['zh-cn'] = '简体';
$config->langs['zh-tw'] = '繁体';
$config->langs['en']    = 'English';

/* Supported charsets. */
$config->charsets['zh-cn']['utf-8'] = 'UTF-8';
$config->charsets['zh-cn']['gbk']   = 'GBK';
$config->charsets['zh-tw']['utf-8'] = 'UTF-8';
$config->charsets['zh-tw']['big5']  = 'BIG5';
$config->charsets['en']['utf-8']    = 'UTF-8';

/* Default settings. */
$config->default = new stdclass();
$config->default->view   = 'html';        // Default view.
$config->default->lang   = 'en';          // Default language.
$config->default->theme  = 'default';     // Default theme.
$config->default->module = 'index';       // Default module.
$config->default->method = 'index';       // Default method.

/* Upload settings. */
$config->file = new stdclass();
$config->file->dangers = 'php,jsp,py,rb,asp,'; // Dangerous files.
$config->file->maxSize = 1024 * 1024;          // Max size.

/* Set the allowed tags.  */
$config->allowedTags = new stdclass();
$config->allowedTags->front = '<p><span><h1><h2><h3><h4><h5><em><u><strong><br><ol><ul><li><img><a><b><font><hr><pre>';    // For front mode.
$config->allowedTags->admin = $config->allowedTags->front . '<div><table><td><th><tr><tbody>';                             // For admin users.

/* Master database settings. */
$config->db = new stdclass();
$config->db->persistant     = false;     // Pconnect or not.
$config->db->driver         = 'mysql';   // Must be MySQL. Don't support other database server yet.
$config->db->encoding       = 'UTF8';    // Encoding of database.
$config->db->strictMode     = false;     // Turn off the strict mode of MySQL.
//$config->db->emulatePrepare = true;    // PDO::ATTR_EMULATE_PREPARES
//$config->db->bufferQuery    = true;     // PDO::MYSQL_ATTR_USE_BUFFERED_QUERY

/* Slave database settings. */
$config->slaveDB = new stdclass();
$config->slaveDB->persistant = false;      
$config->slaveDB->driver     = 'mysql';    
$config->slaveDB->encoding   = 'UTF8';     
$config->slaveDB->strictMode = false;      
$config->slaveDB->checkCentOS= true;       

/* Include the custom config file. */
$configRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$myConfig   = $configRoot . 'my.php';
if(file_exists($myConfig)) include $myConfig;
$rightsConfig = $configRoot . 'rights.php';
if(file_exists($rightsConfig)) include $rightsConfig;


/* Tables for basic system. */
define('TABLE_CONFIG',    '`sys_config`');
define('TABLE_USER',      '`sys_user`');
define('TABLE_GROUP',     '`sys_group`');
define('TABLE_GROUPPRIV', '`sys_groupPriv`');
define('TABLE_USERGROUP', '`sys_userGroup`');
define('TABLE_USERQUERY', '`sys_userQuery`');
define('TABLE_ACTION',    '`sys_action`');
define('TABLE_FILE',      '`sys_file`');
define('TABLE_HISTORY',   '`sys_history`');
define('TABLE_CATEGORY',  '`sys_category`');
define('TABLE_ARTICLE',   '`sys_article`');
define('TABLE_EXTENSION', '`sys_extension`');
define('TABLE_WEBAPP',    '`sys_webapp`');
define('TABLE_LANG',      '`sys_lang`');
define('TABLE_ENTRY',     '`sys_entry`');
define('TABLE_SSO',       '`sys_sso`');
define('TABLE_TASK',      '`sys_task`');
define('TABLE_ISSUE',     '`sys_issue`');
define('TABLE_TAG',       '`sys_tag`');

/* Tables for crm. */
define('TABLE_ADDRESS',       '`crm_address`');
define('TABLE_PRODUCT',       '`sys_product`');
define('TABLE_ORDERFIELD',    '`crm_orderField`');
define('TABLE_ORDERACTION',   '`crm_orderAction`');
define('TABLE_ORDER',         '`crm_order`');
define('TABLE_CUSTOMER',      '`crm_customer`');
define('TABLE_TEAM',          '`crm_team`');
define('TABLE_RESUME',        '`crm_resume`');
define('TABLE_CONTACT',       '`crm_contact`');
define('TABLE_CONTRACT',      '`crm_contract`');
define('TABLE_CONTRACTORDER', '`crm_contractOrder`');
define('TABLE_SERVICE',       '`crm_service`');

/* Tables for oa. */
define('TABLE_TODO',        '`oa_todo`');
define('TABLE_PROJECT',     '`oa_project`');
define('TABLE_EFFORT',      '`oa_effort`');
define('TABLE_BLOCK',       '`oa_block`');
define('TABLE_BOOK',        '`oa_book`');
define('TABLE_LAYOUT',      '`oa_layout`');
define('TABLE_DOC',         '`oa_doc`');
define('TABLE_DOCLIB',      '`oa_docLib`');
define('TABLE_RELATION',    '`oa_relation`');

/* Tables for cash. */
define('TABLE_DEPOSITOR', '`cash_depositor`');
define('TABLE_BALANCE',   '`cash_balance`');
define('TABLE_TRADE',     '`cash_trade`');

/* Tables for team. */
define('TABLE_THREAD',  '`team_thread`');
define('TABLE_REPLY',   '`team_reply`');
define('TABLE_MESSAGE', '`sys_message`');

/* The mapping list of object and tables. */
$config->objectTables['product']     = TABLE_PRODUCT;
$config->objectTables['project']     = TABLE_PROJECT;
$config->objectTables['task']        = TABLE_TASK;
$config->objectTables['user']        = TABLE_USER;
$config->objectTables['todo']        = TABLE_TODO;
$config->objectTables['order']       = TABLE_ORDER;
$config->objectTables['orderAction'] = TABLE_ORDERACTION;
$config->objectTables['orderField']  = TABLE_ORDERFIELD;

/* Include extension config files. */
$extConfigFiles = glob($configRoot . 'ext/*.php');
if($extConfigFiles) foreach($extConfigFiles as $extConfigFile) include $extConfigFile;
