<?php
/**
 * The edit view of tree module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: edit.html.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.chanzhi.org
 */
?>
<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
?>
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::set('type', $category->type);?>
<form method='post' class='form-horizontal' id='editForm' action="<?php echo inlink('edit', 'categoryID='.$category->id);?>">
  <div class='panel'>
    <div class='panel-heading'><strong><i class="icon-pencil"></i> <?php echo $lang->tree->edit;?></strong></div>
    <div class='panel-body'>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->parent;?></label>
        <div class='col-md-4'><?php echo html::select('parent', $optionMenu, $category->parent, "class='chosen form-control'");?></div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->name;?></label>
        <div class='col-md-4'><?php echo html::input('name', $category->name, "class='form-control'");?></div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->alias;?></label>
        <div class='col-md-9'>
          <div class="input-group">
            <span class="input-group-addon">http://<?php echo $aliasAddon;?></span>
            <?php echo html::input('alias', $category->alias, "class='input-xsm form-control' placeholder='{$lang->alias}'");?>
            <span class="input-group-addon">.html</span>
          </div>
        </div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->keywords;?></label>
        <div class='col-md-9'><?php echo html::input('keywords', $category->keywords, "class='form-control'");?></div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->desc;?></label>
        <div class='col-md-9'><?php echo html::textarea('desc', $category->desc, "class='form-control' rows=3'");?></div>
      </div>
      <?php if($category->type == 'forum'):?>
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->category->moderators;?></label>
        <div class='col-md-9'><?php echo html::input('moderators', $category->moderators, "class='form-control' placeholder='{$lang->board->placeholder->moderators}'");?></div>
      </div>  
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->category->readonly;?></label>
        <div class='col-md-4'><?php echo html::radio('readonly', $lang->category->readonlyList, $category->readonly);?></div>
      </div>  
      <?php endif;?>
      <div class='form-group'>
        <label class='col-md-2'></label>
        <div class='col-md-4'><?php echo html::submitButton() . html::hidden('type', $category->type);?></div>
      </div>
    </div>
  </div>
  <?php if(isset($pageJS)) js::execute($pageJS);?>
</form>
