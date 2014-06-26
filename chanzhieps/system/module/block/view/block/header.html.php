<?php
/**
 * The header view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<header id='header' class='clearfix'>
  <div id='headNav'>
    <div class='wrapper'>
      <nav><?php echo commonModel::printTopBar();?></nav>
    </div>
  </div>
  <div id='headTitle'>
    <div class="wrapper">
      <?php if(isset($this->config->site->logo)):?>
      <?php $logo = json_decode($this->config->site->logo);?>
      <div id='siteLogo'>
        <?php echo html::a($this->config->webRoot, html::image($logo->webPath, "class='logo' title='{$this->config->company->name}'"));?>
      </div>
      <?php else: ?>
      <div id='siteName'><h2><?php echo $this->config->site->name;?></h2></div>
      <?php endif;?>
      <div id='siteSlogan'><span><?php echo $this->config->site->slogan;?></span></div>
    </div>
  </div>
</header>
