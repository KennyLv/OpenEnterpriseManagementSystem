<?php 
include '../../common/view/header.html.php';

$path = array_keys($category->pathNames);
js::set('path', $path);

include '../../common/view/treeview.html.php';
?>
<?php echo $common->printPositionBar($category);?>
<div class='row'>
  <div class='col-md-9'>
    <div class='list list-condensed'>
      <header><h2><?php echo $category->name;?></h2></header>
      <section class='items items-hover'>
        <?php foreach($articles as $article):?>
        <?php $url = inlink('view', "id=$article->id", "category={$category->alias}&name=$article->alias");?>
        <div class='item'>
          <div class='item-heading'>
            <div class="text-muted pull-right">
              <span title="<?php echo $lang->article->views;?>"><i class='icon-eye-open'></i> <?php echo $article->views;?></span> &nbsp; 
              <span title="<?php echo $lang->article->comments;?>"><i class='icon-comments-alt'></i> <?php echo $article->comments;?></span> &nbsp; 
              <span title="<?php echo $lang->article->addedDate;?>"><i class='icon-time'></i> <?php echo substr($article->addedDate, 0, 10);?></span>
            </div>
            <h4><?php echo html::a($url, $article->title);?></h4>
          </div>
          <div class='item-content'>
            <?php if(!empty($article->image)):?>
            <div class='media pull-right'>
              <?php
              $title = $article->image->primary->title ? $article->image->primary->title : $article->title;
              echo html::a($url, html::image($article->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
              ?>
            </div>
            <?php endif;?>
            <div class='text text-muted'><?php echo helper::substr($article->summary, 120, '...');?></div>
          </div>
        </div>
        <?php endforeach;?>
      </section>
      <footer class='clearfix'><?php $pager->show('right', 'short');?></footer>
    </div>
  </div>
  <div class='col-md-3'><side class='page-side'><?php $this->block->printRegion($layouts, 'article_browse', 'side');?></side></div>
</div>
<?php include '../../common/view/footer.html.php';?>
