<?php
/**
 * The setbasic view of company module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     company 
 * @version     $Id: setbasic.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-building'></i> <?php echo $lang->company->setBasic;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th style='width:100px'><?php echo $lang->company->name;?></th>
          <td style='width:50%'><?php echo html::input('name', isset($this->config->company->name) ? $this->config->company->name : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->desc;?></th> 
          <td colspan='2'><?php echo html::textarea('desc',  isset($this->config->company->desc) ? $this->config->company->desc : '', "class='form-control' rows='5'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->company->content;?></th> 
          <td colspan='2'><?php echo html::textarea('content',  isset($this->config->company->content) ? $this->config->company->content : '', "class='form-control' rows='15'");?></td> 
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
