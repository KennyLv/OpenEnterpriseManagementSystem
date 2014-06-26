<?php
/**
 * The header view of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: header.html.php 8583 2014-05-01 01:20:40Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php include 'header.lite.html.php';?>
<style>body {padding-top: 56px}</style>
<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation' id='mainNavbar'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
      <span class='icon-bar'></span>
      <span class='icon-bar'></span>
      <span class='icon-bar'></span>
    </button>
    <?php echo html::a($this->createLink($this->config->default->module), (RUN_MODE == 'front' and isset($lang->app)) ? $lang->app->name : $lang->ranzhi, "class='navbar-brand'");?>
  </div>
  <div class='collapse navbar-collapse'>
    <?php echo commonModel::createMainMenu($this->moduleName);?>
    <?php if(RUN_MODE == 'admin') echo commonModel::createManagerMenu();?>
  </div>
</nav>
<?php 
if(!isset($moduleMenu)) $moduleMenu = commonModel::createModuleMenu($this->moduleName);
if($moduleMenu) echo "$moduleMenu\n<div class='row with-menu page-content'>\n"; else echo "<div class='row page-content'>";
?>
