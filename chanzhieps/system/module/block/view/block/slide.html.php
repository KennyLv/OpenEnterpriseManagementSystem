<?php
/**
 * The about front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php $slides = $this->loadModel('slide')->getList();?>
<?php 
if($slides):?>
<div id='slide' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <?php $height = 0;?>
    <?php foreach($slides as $slide):?>
    <?php $url = empty($slide->mainLink) ? '' : " data-url='" . $slide->mainLink . "'";?>
    <?php if($height == 0 and $slide->height) $height = $slide->height;?>
    <?php if ($slide->backgroundType == 'image'): ?>
    <div class='item'<?php echo $url;?>>
    <?php print(html::image($slide->image));?>
    <?php else: ?>
    <div class='item'<?php echo $url;?> style='<?php echo 'background-color: ' . $slide->backgroundColor . '; height: ' . $height . 'px';?>'>
    <?php endif ?>
      <div class='carousel-caption'>
        <h2 style='color:<?php echo $slide->titleColor;?>'><?php echo $slide->title;?></h2>
        <div><?php echo $slide->summary;?></div>
        <?php
        foreach($slide->label as $key => $label):
        if(trim($label) != '')
        {
            if($slide->buttonUrl[$key])  echo html::a($slide->buttonUrl[$key], $label, "class='btn btn-lg btn-{$slide->buttonClass[$key]}'");
            if(!$slide->buttonUrl[$key]) echo html::commonButton($label, "btn btn-lg btn-{$slide->buttonClass[$key]}");
        }
        endforeach;
        ?>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <a class='left carousel-control' href='#slide' data-slide='prev'>
    <i class='icon-prev'></i>
  </a>
  <a class='right carousel-control' href='#slide' data-slide='next'>
    <i class='icon-next'></i>
  </a>
</div>
<?php endif;?>
