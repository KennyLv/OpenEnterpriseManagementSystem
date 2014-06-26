<?php
/**
 * The upgrade module zh-cn file of ZenTaoPMS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $$
 * @link        http://www.chanzhi.org
 */
$lang->upgrade->common  = '升级';

$lang->upgrade->result  = '升级结果';
$lang->upgrade->fail    = '升级失败';
$lang->upgrade->success = '升级成功';
$lang->upgrade->tohome  = '返回首页';

$lang->upgrade->index         = '检查是否可以执行升级程序';
$lang->upgrade->backup        = '备份数据';
$lang->upgrade->selectVersion = '确认升级之前的版本';
$lang->upgrade->confirm       = '确认要执行的SQL语句';
$lang->upgrade->execute       = '确认执行';
$lang->upgrade->next          = '下一步';

$lang->upgrade->setOkFile = <<<EOT
<div class='alert'>
<h5>请按照下面的步骤操作以确认您的管理员身份。</h5>
<p>创建 <input value='%s' readonly class='autoSelect red'/> 文件。如果存在该文件，使用编辑软件打开，重新保存一遍。</p>
</div>
EOT;

$lang->upgrade->backupData = <<<EOT
<pre>
<strong>使用phpMyAdmin或者mysqldump命令备份数据库。</strong>
<textarea class='autoSelect w-400px red' readonly rows='1' > mysqldump -u %s -p%s %s > chanzhi.sql </textarea>
</pre>
EOT;

$lang->upgrade->versionNote = "务必选择正确的版本，否则会造成数据丢失。";

$lang->upgrade->fromVersions['1_1']   = '1.1.stable';
$lang->upgrade->fromVersions['1_2']   = '1.2.stable';
$lang->upgrade->fromVersions['1_3']   = '1.3.stable';
$lang->upgrade->fromVersions['1_4']   = '1.4.stable';
$lang->upgrade->fromVersions['1_5']   = '1.5.stable';
$lang->upgrade->fromVersions['1_6']   = '1.6.stable';
$lang->upgrade->fromVersions['1_7']   = '1.7.stable';
$lang->upgrade->fromVersions['1_8']   = '1.8.stable';
$lang->upgrade->fromVersions['2_0']   = '2.0.stable';
$lang->upgrade->fromVersions['2_0_1'] = '2.0.1.stable';
$lang->upgrade->fromVersions['2_1']   = '2.1.stable';
$lang->upgrade->fromVersions['2_2']   = '2.2.stable';
$lang->upgrade->fromVersions['2_2_1'] = '2.2.1.stable';
$lang->upgrade->fromVersions['2_3']   = '2.3.stable';
