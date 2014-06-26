<?php
/**
 * The index view file of blog module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     blog
 * @version     $Id: index.html.php 9845 2014-06-10 08:32:06Z daitingting $
 * @link        http://www.ranzhi.org
 */
?>
<?php 
include 'header.html.php';
$path = $category ? array_keys($category->pathNames) : array();
if(!empty($path))         js::set('path',  $path);
if(!empty($category->id)) js::set('categoryID', $category->id );
?>
<div class='col-md-9' id='articles'>
  <section>
    <?php foreach($articles as $article):?>
    <?php $url = inlink('view', "id=$article->id");?>
    <div class="card">
      <h4 class='card-heading'><?php echo html::a($url, $article->title);?></h4>
      <div class='card-content text-muted'>
        <?php echo helper::substr(strip_tags($article->content), 200, '...');?>
        <?php if(!empty($article->image)):?>
          <div class='media pull-right'>
            <?php
            $title = $article->image->primary->title ? $article->image->primary->title : $article->title;
            echo html::a($url, html::image($article->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
            ?>
          </div>
        <?php endif;?>
      </div>
      <div class="card-actions text-muted">
        <span data-toggle='tooltip' title='<?php printf($lang->article->lblAddedDate, formatTime($article->createdDate));?>'><i class="icon-time"></i> <?php echo date('Y/m/d', strtotime($article->createdDate));?></span>
        &nbsp; <span data-toggle='tooltip' title='<?php printf($lang->article->lblAuthor, $article->author);?>'><i class="icon-user"></i> <?php echo $article->author;?></span>
        &nbsp; <span data-toggle='tooltip' title='<?php printf($lang->article->lblViews, $article->views);?>'><i class="icon-eye-open"></i> <?php echo $article->views;?></span>
        <span class='pull-right'>
          <?php echo html::a(inlink('edit', "id={$article->id}&type=blog"), $lang->edit);?>
          <?php echo html::a(inlink('delete', "id={$article->id}"), $lang->delete, "class='deleter'");?>
        </span>
      </div>
    </div>
    <?php endforeach;?>
  </section>
  <footer class='clearfix'><?php $pager->show('right');?></footer>
</div>
<?php include 'footer.html.php';?>
