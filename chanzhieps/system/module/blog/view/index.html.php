<?php
/**
 * The index view file of blog module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     blog
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php 
include './header.html.php';
include '../../common/view/treeview.html.php';
if(isset($category)) $path = array_keys($category->pathNames);
if(!empty($path))         js::set('path',  $path);
if(!empty($category->id)) js::set('categoryID', $category->id);
?>
<?php
$root = '<li>' . $this->lang->currentPos . $this->lang->colon .  html::a($this->inlink('index'), $lang->home) . '</li>';
if(!empty($category)) echo $common->printPositionBar($category, '', '', $root);
?>
<div class='row'>
  <div class='col-md-9' id='articles'>
    <?php foreach($articles as $article):?>
    <?php if(!isset($category)) $category = array_shift($article->categories);?>
      <?php $url = inlink('view', "id=$article->id", "category={$category->alias}&name=$article->alias"); ?>
      <div class="card">
        <h4 class='card-heading'><?php echo html::a($url, $article->title);?></h4>
        <div class='card-content text-muted'>
          <?php if(!empty($article->image)):?>
            <div class='media pull-right'>
              <?php
              $title = $article->image->primary->title ? $article->image->primary->title : $article->title;
              echo html::a($url, html::image($article->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
              ?>
            </div>
          <?php endif;?>
          <?php echo $article->summary;?>
        </div>
        <div class="card-actions text-muted">
          <span data-toggle='tooltip' title='<?php printf($lang->article->lblAddedDate, formatTime($article->addedDate));?>'><i class="icon-time"></i> <?php echo date('Y/m/d', strtotime($article->addedDate));?></span>
          &nbsp; <span data-toggle='tooltip' title='<?php printf($lang->article->lblAuthor, $article->author);?>'><i class="icon-user"></i> <?php echo $article->author;?></span>
          &nbsp; <span data-toggle='tooltip' title='<?php printf($lang->article->lblViews, $article->views);?>'><i class="icon-eye-open"></i> <?php echo $article->views;?></span>
          &nbsp; <a href="<?php echo $url . '#commentForm'?>"><span data-toggle='tooltip' title='<?php printf($lang->article->lblComments, $article->comments);?>'><i class="icon-comments-alt"></i> <?php echo $article->comments;?></span></a>
        </div>
      </div>
    <?php endforeach;?>
    <div class='clearfix pager'><?php $pager->show('right', 'short');?></div>
  </div>
  <div class='col-md-3'><side class='page-side'><div class='panel-pure panel'><?php echo html::a(helper::createLink('rss', 'index', '?type=blog', '', 'xml'), "<i class='icon-rss text-warning'></i> " . $lang->blog->subscribe, "target='_blank' class='btn btn-lg btn-block'"); ?></div><?php $this->block->printRegion($layouts, 'blog_index', 'side');?></side></div>
</div>
<?php include './footer.html.php';?>
