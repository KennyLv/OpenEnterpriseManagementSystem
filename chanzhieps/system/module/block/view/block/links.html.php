<?php
/**
 * The link front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php if($this->app->getModuleName() != 'links' and !empty($this->config->links->index)):?>
<div id="block<?php echo $block->id;?>" class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon'><?php echo $icon;?></i><?php echo $block->title;?></strong>
    <div class='pull-right'>
      <?php if(trim(strip_tags($this->config->links->all, '<a>'))):?>
      <?php echo html::a(helper::createLink('links', 'index'), $this->lang->more); ?>
      <?php endif;?>
    </div>
  </div>
  <div class='panel-body'><?php echo $this->config->links->index;?></div>
</div>
<?php endif;?>
