<?php
/**
 * The view file of browse function of announce module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com> 
 * @package     announce 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php'; ?>
<div id="mainContent">
  <div class='panel list list-condensed'>
    <div class='panel-heading'><h4><i class='icon-calendar'></i><?php echo $lang->announce->browse;?></h4></div>
    <section class='items items-hover'>
      <?php foreach($articles as $article):?>
      <div class='item'>
        <div class='item-heading'>
          <div class="text-muted pull-right">
            <span title="<?php echo $users[$article->author];?>"><i class='icon-user'></i> <?php echo $users[$article->author];?></span> &nbsp; 
            <span title="<?php echo $lang->article->createdDate;?>"><i class='icon-time'></i> <?php echo substr($article->createdDate, 0, 10);?></span>&nbsp; 
          </div>
          <h4><?php echo $article->title;?></h4>
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
          <div class='text'><?php echo $article->content;?></div>
          <div class='text pull-right'>
            <?php echo html::a(inlink('edit', "articleID={$article->id}"), $lang->edit);?>
            <?php echo html::a(inlink('delete', "articleID={$article->id}"), $lang->delete, "class='deleter'");?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </section>
    <footer class='clearfix'><?php $pager->show('right', 'short');?></footer>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
