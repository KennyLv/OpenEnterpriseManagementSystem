<?php
/**
 * The reset password mail view file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php
$mailContent = <<<EOT
<html>
<head>
<style type='text/css'>
body{margin:0; padding:0;}
div{padding-left:30px;} 
</style>
</head>
<body>
<div style='padding-top:20px;height:60px;background:#fafafa;border-bottom:1px solid #ddd;font-size:18px;font-weight:bold'>{$this->lang->user->resetmail->subject}</div>
<div style='margin-top:20px;'>
<p>
{$this->lang->user->resetmail->account} {$account}
<br>
{$this->lang->user->resetmail->resetUrl}
<br>
<a href='{$resetURL}' target='_blank'>{$resetURL}</a>
</p>
<p>{$this->lang->user->resetmail->reset} {$reset}</p>
</div>
<div style='height:20px;border-bottom:1px solid #ddd;'></div>
<div style='margin:20px 0 0 0 ;'>{$this->lang->user->resetmail->notice}</div>
</body>
</html>
EOT;
