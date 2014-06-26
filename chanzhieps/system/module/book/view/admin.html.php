<?php
/**
 * The admin browse view file of book module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php 
$path = explode(',', $node->path);
js::set('path', $path);
?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-book'></i> <?php echo $book->title;?></strong>
    <div class='panel-actions'>
      <?php echo html::a($this->inlink('create'), '<i class="icon-plus"></i> ' . $lang->book->createBook, "class='btn btn-primary'");?>
    </div>
  </div>
  <div class='panel-body'><div class='books'><?php echo $catalog;?></div></div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
