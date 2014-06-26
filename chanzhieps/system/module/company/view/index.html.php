<?php 
include '../../common/view/header.html.php';
?>
<?php $common->printPositionBar($this->app->getModuleName());?>
<div class="row">
  <div class="col-md-9">
    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-group'></i> <?php echo $lang->aboutUs; ?></strong></div>
      <div class="panel-body">
        <div class='article-content'>
          <?php echo $company->content;?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel">
      <div class="panel-heading"><strong><i class="icon-phone"></i> <?php echo $lang->company->contact;?></strong></div>
      <div class="panel-body">
        <table class='table table-data'>
        <?php foreach($contact as $item => $value):?>
          <tr>
            <th><?php echo $lang->company->$item;?>:</th>
            <td><?php echo $value;?></td>
          </tr>
        <?php endforeach;?>
        </table>
      </div>
    </div>
    <?php if(!empty($publicList)):?>
    <div class='panel hidden-sm hidden-xs'>
      <div class='panel-heading'><strong><i class='icon-weixin'></i> <?php echo $lang->company->qrcode;?></strong></div>
        <table class='w-p100'>
          <?php foreach($publicList as $public):?>
          <?php if(!$public->qrcode) continue;?>
          <tr class='text-center'>
            <td class='wechat-block'>
              <div class='name'><i class='icon-weixin'>&nbsp;</i><?php echo $public->name;?></div>
              <div class='qrcode'><?php echo html::image($public->qrcode, "class='w-220px'");?></div>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
    </div>
    <?php endif;?>
  </div>
</div>

<?php include '../../common/view/footer.html.php'; ?>
