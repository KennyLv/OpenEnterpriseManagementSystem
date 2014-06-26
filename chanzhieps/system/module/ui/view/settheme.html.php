<?php
/**
 * The settheme view file of ui module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::import($jsRoot  . 'theme.js');  ?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-lemon'></i> <?php echo $lang->ui->setTheme?></strong>
  </div>
  <div class='panel-body'>
    <div class='cards' id='themes'>
    <?php foreach($lang->ui->themes as $theme => $name):?>
    <?php
    $custom = false;
    if(is_array($name))
    {
        $custom = $name['custom'];
        $name   = $name['name']; 
    }
    ?>
    <?php $current = $theme == $config->site->theme ? ' current' : ''; ?>
      <div class='card-wrapper'>
        <a class='card ajax-theme<?php echo $current . ($custom ? ' custom' : ''); ?>' href='<?php echo inlink('settheme', "theme={$theme}"); ?>' title='<?php echo $lang->ui->changetheme; ?>'>
          <?php echo html::image($themeRoot . $theme . '/preview.png'); ?>
          <i class='icon-large icon-ok pull-right'></i>
          <div class='msg'></div>
          <div class='actions'>
            <button class='btn btn-lg btn-preview' data-url='<?php echo $config->webRoot;?>'><i class='icon-eye-open'></i> <?php echo $lang->ui->preview;?></button>
            <?php if($custom):?>
            <button data-toggle='modal' class='btn btn-lg btn-success btn-custom' data-url='<?php echo inlink('customtheme', "theme={$theme}");?>'><i class='icon-cog'></i> <?php echo $lang->ui->custom;?></button>
            <?php endif;?>
          </div>
        </a>
        <div class='pull-right text-muted'><a data-width='825' data-height='220' href='<?php echo $themeRoot . $theme . '/preview.png';?>' data-toggle='lightbox'><i class='icon-picture'></i></a></div>
        <div class='name'><?php echo $name;?></div>
      </div>
    <?php endforeach;?>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
