<?php
/**
 * The zh-tw file of install module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     install 
 * @version     $Id: zh-tw.php 8551 2014-04-30 01:16:47Z wwccss $
 * @link        http://www.ranzhi.org
 */
$lang->install = new stdclass();
$lang->install->common  = '安裝';
$lang->install->next    = '下一步';
$lang->install->pre     = '返回';
$lang->install->reload  = '刷新';
$lang->install->error   = '錯誤 ';

$lang->install->start            = '開始安裝';
$lang->install->keepInstalling   = '繼續安裝當前版本';
$lang->install->seeLatestRelease = '看看最新的版本';
$lang->install->welcome          = "您睿智地選擇了$lang->ranzhi!";
$lang->install->desc             = <<<EOT
<blockquote>
  <strong>{$lang->ranzhi}</strong>由<strong><a href='http://www.cnezsoft.com' target='_blank' class='red'>青島易軟天創網絡科技有限公司</a>開發</strong>，
  <!--內置項目、客戶、現金流、辦公和溝通共五大核心功能模組，-->
  專為中小型團隊量身打造，是中小型團隊信息化的首選工具！

  官方網站：<a href='http://www.ranzhi.org' target='_blank'>http://www.ranzhi.org</a>
  技術支持: <a href='http://www.ranzhi.org/forum/' target='_blank'>http://www.ranzhi.org/forum/</a>
  您現在正在安裝的版本是 <strong class='red'>%s</strong>。
</blockquote>
EOT;

$lang->install->choice     = '您可以選擇：';
$lang->install->checking   = '系統檢查';
$lang->install->ok         = '通過(√)';
$lang->install->fail       = '失敗(×)';
$lang->install->loaded     = '已加載';
$lang->install->unloaded   = '未加載';
$lang->install->exists     = '目錄存在 ';
$lang->install->notExists  = '目錄不存在 ';
$lang->install->writable   = '目錄可寫 ';
$lang->install->notWritable= '目錄不可寫 ';
$lang->install->phpINI     = 'PHP配置檔案';
$lang->install->checkItem  = '檢查項';
$lang->install->current    = '當前配置';
$lang->install->result     = '檢查結果';
$lang->install->action     = '如何修改';

$lang->install->phpVersion = 'PHP版本';
$lang->install->phpFail    = 'PHP版本必須大於5.2.0';

$lang->install->pdo          = 'PDO擴展';
$lang->install->pdoFail      = '修改PHP配置檔案，加載PDO擴展。';
$lang->install->pdoMySQL     = 'PDO_MySQL擴展';
$lang->install->pdoMySQLFail = '修改PHP配置檔案，加載pdo_mysql擴展。';
$lang->install->tmpRoot      = '臨時檔案目錄';
$lang->install->dataRoot     = '上傳檔案目錄';
$lang->install->mkdir        = '<p>需要創建目錄%s。linux下面命令為：<br /> <code>mkdir -p %s</code></p>';
$lang->install->chmod        = '需要修改目錄 "%s" 的權限。linux下面命令為：<br /><code>chmod o=rwx -R %s</code>';

$lang->install->settingDB  = '設置資料庫';
$lang->install->dbHost     = '資料庫伺服器';
$lang->install->dbHostNote = '如果127.0.0.1無法訪問，嘗試使用localhost';
$lang->install->dbPort     = '伺服器連接埠';
$lang->install->dbUser     = '資料庫用戶名';
$lang->install->dbPassword = '資料庫密碼';
$lang->install->dbName     = '資料庫名';
$lang->install->dbPrefix   = '建表使用的首碼';
$lang->install->createDB   = '自動創建資料庫';
$lang->install->clearDB    = '清空現有數據';

$lang->install->errorConnectDB     = '資料庫連接失敗。 ';
$lang->install->errorCreateDB      = '資料庫創建失敗。';
$lang->install->errorDBExists      = '資料庫已經存在，繼續安裝返回上步並選中“清空數據”選項。';
$lang->install->errorCreateTable   = '創建表失敗。';

$lang->install->setConfig  = '資料庫配置';
$lang->install->key        = '配置項';
$lang->install->value      = '值';
$lang->install->saveConfig = '保存配置檔案';
$lang->install->save2File  = '<span class="red">嘗試寫入配置檔案，失敗！</span>拷貝上面文本框中的內容，將其保存到 "<strong> %s </strong>"中。';
$lang->install->saved2File = '配置信息已經成功保存到" <strong>%s</strong> "中。您後面還可繼續修改此檔案。';
$lang->install->errorNotSaveConfig = '還沒有保存配置檔案';

$lang->install->setAdmin = '設置管理員';
$lang->install->account  = '帳號';
$lang->install->password = '密碼';
$lang->install->errorEmptyPassword = '密碼不能為空';

$lang->install->success    = "安裝成功！";
$lang->install->visitFront = '登錄前台';
$lang->install->visitAdmin = '登錄後台';
