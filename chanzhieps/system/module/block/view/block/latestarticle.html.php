<?php
/**
 * The latest article front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php 
/* Set $themRoot. */
$themeRoot = $this->config->webRoot . 'theme/';

/* Decode the content and get articles. */
$content  = json_decode($block->content);
$method   = 'get' . ucfirst(str_replace('article', '', strtolower($block->type)));
$articles = $this->loadModel('article')->$method(empty($content->category) ? 0 : $content->category, $content->limit);
?>
<div id="block<?php echo $block->id;?>" class='panel panel-block <?php echo $blockClass;?>'>
  <div class='panel-heading'>
    <strong><?php echo $icon . $block->title;?></strong>
    <?php if(!empty($content->moreText) and !empty($content->moreUrl)):?>
    <div class='pull-right'><?php echo html::a($content->moreUrl, $content->moreText);?></div>
    <?php endif;?>
  </div>
  <?php if(isset($content->image)):?>
  <div class='panel-body'>
    <div class='items'>
    <?php
    foreach($articles as $article):
    $category = array_shift($article->categories);
    $url = helper::createLink('article', 'view', "id=$article->id", "category={$category->alias}&name=$article->alias");
    ?>
      <div class='item'>
        <div class='item-heading'><strong><?php echo html::a($url, $article->title);?></strong></div>
        <div class='item-content'>
          
          <div class='text small text-muted'>
            <div class='media pull-left'>
            <?php 
            if(!empty($article->image))
            {
                $title = $article->image->primary->title ? $article->image->primary->title : $article->title;
                echo html::a($url, html::image($article->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
            }
            ?>
            </div>
            <strong class='text-important'><i class='icon-time'></i> <?php echo substr($article->addedDate, 0, 10);?></strong> &nbsp;<?php echo $article->summary;?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <?php else:?>
  <div class='panel-body'>
    <ul class='ul-list'>
      <?php foreach($articles as $article): ?>
      <?php 
      $category = array_shift($article->categories);
      $alias    = empty($category) ? "name={$article->alias}" : "category={$category->alias}&name={$article->alias}";
      $url      = helper::createLink('article', 'view', "id={$article->id}", $alias);
      ?>
      <?php if(isset($content->time)):?>
      <li>
        <?php echo html::a($url, $article->title, "title='{$article->title}'");?>
        <span class='pull-right'><?php echo substr($article->addedDate, 0, 10);?></span>
      </li>
      <?php else:?>
      <li><?php echo html::a($url, $article->title, "title='{$article->title}'");?></li>
      <?php endif;?>
      
      <?php endforeach;?>
    </ul>
  </div>
  <?php endif;?>
</div>
