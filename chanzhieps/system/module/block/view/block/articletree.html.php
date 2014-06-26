<?php
/**
 * The category front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php
$this->loadModel('tree');
$block->content = json_decode($block->content);
$type           = str_replace('tree', '', strtolower($block->type));
$browseLink     = $type == 'article' ? 'createBrowseLink' : 'create' . ucfirst($type) . 'BrowseLink';
?>
<?php if($block->content->showChildren):?>
<?php $treeMenu = $this->tree->getTreeMenu($type, 0, array('treeModel', $browseLink));?>
<div id="block<?php echo $block->id;?>" class='panel panel-block <?php echo $blockClass;?>'>
  <div class='panel-heading'>
    <h4><?php echo $icon . $block->title;?></h4>
  </div>
  <div class='panel-body'><?php echo $treeMenu;?></div>
</div>
<?php else:?>
<?php $topCategories = $this->tree->getChildren(0, $type);?>
<div id="block<?php echo $block->id?>" class='panel panel-block <?php echo $blockClass;?>'>
  <div class='panel-heading'>
    <h4><?php echo $icon . $block->title;?></h4>
  </div>
  <div class='panel-body'>
    <ul class='nav nav-secondary nav-stacked'>
      <?php
      foreach($topCategories as $topCategory)
      {
          $browseLink = helper::createLink($type, 'browse', "categoryID={$topCategory->id}", "category={$topCategory->alias}");
          echo '<li>' . html::a($browseLink, "<i class='icon-folder-close-alt '></i> &nbsp;" . $topCategory->name, "id='category{$topCategory->id}'") . '</li>';
      }
      ?>
    </ul>
  </div>
</div>
<?php endif;?>
