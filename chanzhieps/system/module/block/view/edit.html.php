<?php
/**
 * The edit view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php js::set('id', $block->id); ?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-edit'></i> <?php echo $lang->block->edit;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table align='center' class='table table-form'>
        <tr>
          <th class='w-120px'><?php echo $lang->block->type;?></th>
          <td><?php echo $this->block->createTypeSelector($type, $block->id);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->block->title;?></th>
          <td><?php echo html::input('title', $block->title, "class='form-control'");?></td>
        </tr>
        <?php if(isset($config->block->defaultIcons[$type])):?>
        <?php if(!isset($block->content->icon)) $block->content->icon = $config->block->defaultIcons[$type];?>
        <tr>
          <th><?php echo $lang->block->icon;?></th>
          <td><?php echo html::select('params[icon]', '', '', "class='chosen-icons' data-value='{$block->content->icon}'");?></td>
        </tr>
        <?php endif;?>
        <?php echo $this->fetch('block', 'blockForm', 'type=' . $type . '&id=' . $block->id);?>
        <?php if(isset($config->block->defaultMoreUrl[$block->type])):?>
        <tr>
          <th><?php echo $lang->block->moreLink;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::input('params[moreText]', $block->content->moreText, "class='form-control'  placeholder='{$lang->block->placeholder->moreText}'");?>
              <span class="input-group-addon fix-border"><i class="icon icon-link"></i></span>
              <?php echo html::input('params[moreUrl]', $block->content->moreUrl, "class='form-control' placeholder='{$lang->block->placeholder->moreUrl}'");?>
          </td>
        </tr>
        <?php endif;?>
        <tr>
          <td></td>
          <td>
            <?php echo html::submitButton() . html::hidden('blockID', $block->id);?>
            <?php echo html::a($this->session->blockList, $this->lang->goback, "class='btn btn-default'");?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
