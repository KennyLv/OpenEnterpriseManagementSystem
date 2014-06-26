<?php
/**
 * The featured product front view file of block module of chanzhiEPS.
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
$content  = json_decode($block->content);
$product  = $this->loadModel('product')->getByID($content->product);
?>
<?php if(!empty($product)):?>
<?php
$category = array_shift($product->categories);
$alias    = !empty($category) ? $category->alias : '';
$url      = helper::createLink('product', 'view', "id={$product->id}", "category={$alias}&name={$product->alias}");
?>
<div id="block<?php echo $block->id;?>" class='panel panel-block <?php echo $blockClass;?>'>
  <div class='panel-body'>
    <a class='card' href="<?php echo $url;?>">
      <div class='media' style='background-image: url(<?php echo $product->image->primary->middleURL; ?>); background-iamge:none\0;'><?php echo html::image($product->image->primary->middleURL, "title='{$product->name}' alt='{$product->name}'"); ?></div>
      <div class='card-heading'>
        <strong><?php echo $product->name; ?></strong>
        <div class='text-latin'>
        <?php
        if($product->promotion != 0)
        {
            echo "<span class='text-muted'>" . $this->lang->product->currencyIcon . "</span> ";
            echo "<strong class='text-danger'>" . $product->promotion . '</strong>';
            if($product->price != 0)
            {
                echo "&nbsp;&nbsp;<del class='text-muted'>" . $this->lang->product->currencyIcon . $product->price .'</del>';
            }
        }
        else
        {
            if($product->price != 0)
            {
                echo "<span class='text-muted'> {$this->lang->product->currencyIcon}</span> ";
                echo "<strong class='text-important'>" . $product->price . '</strong>&nbsp;&nbsp;';
            }
        }
        ?>
        </div>
      </div>
      <div class='card-content text-muted'><?php echo helper::substr($product->summary, 80);?></div>
    </a>
  </div>
</div>
<?php endif;?>
