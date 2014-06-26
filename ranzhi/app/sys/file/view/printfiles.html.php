<?php
/**
 * The print files view file of file module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     file 
 * @version     $Id: buildform.html.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhi.org
 */
$sessionString  = $config->requestType == 'PATH_INFO' ? '?' : '&';
$sessionString .= session_name() . '=' . session_id();
?>
<style>.button-c {padding:1px}</style>
<script language='Javascript'>
/* Delete a file. */
function deleteFile(fileID)
{
    if(!fileID) return;
    hiddenwin.location.href =createLink('file', 'delete', 'fileID=' + fileID);
}
/* Download a file, append the mouse to the link. Thus we call decide to open the file in browser no download it. */
function downloadFile(fileID)
{
    if(!fileID) return;
    var sessionString = '<?php echo $sessionString;?>';
    var url = createLink('file', 'download', 'fileID=' + fileID + '&mouse=left') + sessionString;
    window.open(url, '_blank');
    return false;
}
</script>
<?php if($fieldset == 'true'):?>
<fieldset>
  <legend><?php echo $lang->file->common;?></legend>
<?php endif;?>
  <div>
  <?php
  foreach($files as $file)
  {
      echo html::a($this->createLink('file', 'download', "fileID=$file->id") . $sessionString, $file->title .'.' . $file->extension, '_blank', "onclick='return downloadFile($file->id)'");
      echo html::a($this->createLink('file', 'edit', "fileID=$file->id"), "<i class='icon-edit'></i>", "data-toggle='modal'");
      echo html::a($this->createLink('file', 'delete', "fileID=$file->id"), "<i class='icon-remove'></i>", "class='deleter'");
  }
  ?>
  </div>
<?php if($fieldset == 'true') echo '</fieldset>';?>
