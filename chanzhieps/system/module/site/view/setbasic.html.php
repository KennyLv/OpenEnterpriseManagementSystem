<?php
/**
 * The setbasic view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-globe'></i> <?php echo $lang->site->setBasic;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='col-xs-2'><?php echo $lang->site->type;?></th> 
          <td class='col-xs-5'><?php echo html::radio('type', $lang->site->typeList, isset($this->config->site->type) ? $this->config->site->type : 'compnay', "class='checkbox'");?></td><td></td>
        </tr>
        <tr>
          <th class='col-xs-2'><?php echo $lang->site->name;?></th> 
          <td class='col-xs-5'><?php echo html::input('name', $this->config->site->name, "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->module;?></th>
          <td><?php echo html::checkbox('moduleEnabled', $lang->site->moduleAvailable, isset($this->config->site->moduleEnabled) ? $this->config->site->moduleEnabled : '');?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->lang;?></th>
          <td><?php echo html::select('lang', $config->langs, isset($this->config->site->lang) ? $this->config->site->lang : 'zh-cn', "class='form-control chosen'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->copyright;?></th> 
          <td><?php echo html::input('copyright', $this->config->site->copyright, "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->keywords;?></th> 
          <td colspan='2'><?php echo html::input('keywords', $this->config->site->keywords, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->indexKeywords;?></th> 
          <td colspan='2'><?php echo html::input('indexKeywords', $this->config->site->indexKeywords, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->slogan;?></th> 
          <td colspan='2'><?php echo html::input('slogan', $this->config->site->slogan, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->site->desc;?></th> 
          <td colspan='2'><?php echo html::textarea('desc', $this->config->site->desc, "class='form-control' rows='10'");?></td> 
        </tr>
       <tr>
          <th><?php echo $lang->site->icp;?></th> 
          <td colspan='2'><?php echo html::input('icp', $this->config->site->icp, "class='form-control'");?></td> 
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
