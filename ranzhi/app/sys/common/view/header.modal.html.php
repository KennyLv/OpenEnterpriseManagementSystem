<?php
/**
 * The header.modal view of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php if(helper::isAjaxRequest()):?>
<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
if(isset($pageCSS)) css::internal($pageCSS);
?>
<div class="modal-dialog" style="width:<?php echo empty($modalWidth) ? 700 : $modalWidth;?>px;">
  <div class="modal-content">
    <div class="modal-header">
      <?php echo html::closeButton();?>
      <h4 class="modal-title"><?php if(!empty($title)) echo $title; ?></h4>
    </div>
    <div class="modal-body">
<?php else:?>
<?php include $this->app->getAppRoot() . '/common/view/header.html.php';?>
<?php endif;?>
