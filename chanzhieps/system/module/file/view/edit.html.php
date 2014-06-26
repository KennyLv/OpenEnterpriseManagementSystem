<div class='modal-dialog w-500px'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h4 class='modal-title'><i class='icon-edit'></i> <?php echo $lang->file->edit;?></h4>
    </div>
    <div class='modal-body'>
      <form method='post' enctype='multipart/form-data' id='fileForm' action='<?php echo $this->createLink('file', 'edit', "fileID=$file->id")?>'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $lang->file->title;?></th> 
            <td><?php echo html::input('title',$file->title, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->file->editFile;?></th>
            <td><?php echo html::file('upFile', "class='form-control'");?></td>
          </tr>
          <tr>
            <th></th>
            <td><?php echo html::submitButton() . html::commonButton($lang->goback, 'btn btn-default goback')?></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<script>
$(function()
{
    $.setAjaxForm('#fileForm', function(data){$.reloadAjaxModal();}); 
    $('.goback').click(function(){$.reloadAjaxModal();})
})
</script>
