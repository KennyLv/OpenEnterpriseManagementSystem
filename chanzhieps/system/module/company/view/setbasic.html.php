<?php
/**
 * The browse view file of company module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     company
 * @version     $Id$
 * @link        http://www.chanzhi.org
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
          <th class='w-100px'><?php echo $lang->company->name;?></th>
          <td class='w-p50'><?php echo html::input('name', isset($this->config->company->name) ? $this->config->company->name : '', "class='form-control'");?></td><td></td>
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
