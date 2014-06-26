<?php if(!$writeable):?>
<h5 class='text-danger a-left'> <?php echo $this->lang->file->errorUnwritable;?> </h5>
<?php else:?>
<div class="file-form">
  <?php for($i = 0; $i < $fileCount; $i ++):?>
  <div class='form-group clearfix'>
    <div class='col-sm-5'><input type='file' class='form-control' name='files[]' id="file<?php echo $i;?>"  tabindex='-1' /></div>
    <div class='col-sm-7'><input type='text' id='label<?php echo $i;?>' name='labels[]' class='form-control' tabindex='-1' placeholder='<?php echo $lang->file->label;?>'/></div>
  </div>
  <?php endfor;?>
</div>
<?php endif;?>
