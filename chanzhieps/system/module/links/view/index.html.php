<?php 
include '../../common/view/header.html.php';
?>
<?php $common->printPositionBar($this->app->getModuleName());?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-link'></i> <?php echo $lang->links->common;?></strong></div>
  <div class='panel-body'><?php echo $links->all;?></div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
