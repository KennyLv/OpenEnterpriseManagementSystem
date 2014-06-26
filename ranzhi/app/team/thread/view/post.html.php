<?php
/**
 * The post view file of thread module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     thread
 * @version     $Id: post.html.php 9841 2014-06-10 05:57:49Z daitingting $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php js::set('boardID', $board->id);?>
<div class='row'>
  <?php include './side.html.php';?>
  <div class='col-md-10'>
    <?php $common->printPositionBar($board);?>
    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-edit'></i> <?php echo $lang->thread->postTo . ' [ ' . $board->name . ' ]'; ?></strong></div>
      <div class='panel-body'>
        <form method='post' class='form-horizontal' id='ajaxForm' enctype='multipart/form-data'>
          <div class='form-group'>
            <label class='col-md-1 col-sm-2 control-label'><?php echo $lang->thread->title;?></label>
            <div class='col-md-11 col-sm-10'>
            <?php if($canManage):?>
              <div class='input-group'>
                <?php echo html::input('title', '', "class='form-control'");?>
                <span class='input-group-addon'>
                  <label class='checkbox'>
                      <?php echo "<input type='checkbox' name='readonly' value='1'/><span>{$lang->thread->readonly}</span>" ?>
                  </label>
                </span>
              </div>
            <?php else:?>
              <?php echo html::input('title', '', "class='form-control'");?>
            <?php endif;?>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-md-1 col-sm-2 control-label'><?php echo $lang->thread->content;?></label>
            <div class='col-md-11 col-sm-10'><?php echo html::textarea('content', '', "rows='15' class='form-control'");?></div>
          </div>
          <div class='form-group'>
            <label class='col-md-1 col-sm-2 control-label'><?php echo $lang->thread->file;?></label>
            <div class='col-md-7 col-sm-8 col-xs-11'><?php echo $this->fetch('file', 'buildForm');?></div>
          </div>
          <div class='form-group'>
            <label class='col-md-1 col-sm-2'></label>
            <div class='col-md-11 col-sm-10'><?php echo html::submitButton();?></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
