<div class='modal-dialog w-1000px'>
  <div class='modal-content'>
    <div class='modal-header'>
      <?php echo html::closeButton();?>
      <h4 class='modal-title' id='ajaxModalTitle'><i class='icon-paper-clip'></i> <?php echo $lang->wechat->qrcode;?></h4>
    </div>
    <div class='modal-body'>
      <form method='post' id='qrcodeForm' enctype='multipart/form-data' action="<?php echo inlink('qrcode', "public={$public->id}")?>">
        <table class='table table-form'>
          <tr>
            <?php if(!empty($qrcodeURL)) echo '<td>' . html::image($qrcodeURL) . '</td>';?>
            <td><input type='file' name='file' id='file' class='form-control'></td>
            <td><?php echo html::submitButton();?></td>
            <td class='w-200px'><strong class='text-info'><?php echo $lang->wechat->qrcodeType; ?></strong></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php if(isset($pageJS)) js::execute($pageJS);?>
