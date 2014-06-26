<?php
/**
 * The edit file of bug module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     bug
 * @version     $Id: edit.html.php 4259 2013-01-24 05:49:40Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php
include '../../common/view/header.html.php';
include '../../common/view/chosen.html.php';
include '../../common/view/chosen.html.php';
include '../../common/view/alert.html.php';
include '../../common/view/kindeditor.html.php';
js::set('page'                   , 'edit');
js::set('changeProductConfirmed' , false);
js::set('changeProjectConfirmed' , false);
js::set('confirmChangeProduct'   , $lang->bug->confirmChangeProduct);
js::set('planID'                 , $bug->plan);
js::set('oldProjectID'           , $bug->project);
js::set('oldStoryID'             , $bug->story);
js::set('oldTaskID'              , $bug->task);
js::set('oldOpenedBuild'         , $bug->openedBuild);
js::set('oldResolvedBuild'       , $bug->resolvedBuild);
?>

<form class='form-condensed' method='post' target='hiddenwin' enctype='multipart/form-data' id='dataform'>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['bug']);?> <strong><?php echo $bug->id;?></strong></span>
    <strong><?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), $bug->title);?></strong>
    <small><?php echo html::icon($lang->icons['edit']) . ' ' . $lang->bug->edit;?></small>
  </div>
  <div class='actions'>
    <?php echo html::submitButton($lang->save)?>
  </div>
</div>
<div class='row-table'>
  <div class='col-main'>
    <div class='main'>
      <div class='form-group'>
        <?php echo html::input('title', str_replace("'","&#039;",$bug->title), 'class="form-control" placeholder="' . $lang->bug->title . '"');?>
      </div>
      <fieldset>
        <legend><?php echo $lang->bug->legendSteps;?></legend>
        <div class='form-group'><?php echo html::textarea('steps', htmlspecialchars($bug->steps), "rows='12' class='form-control'");?></div>
      </fieldset>
      <fieldset>
        <legend><?php echo $lang->bug->legendComment;?></legend>
        <div class='form-group'><?php echo html::textarea('comment', '', "rows='6' class='form-control'");?></div>
      </fieldset>
      <fieldset>
        <legend><?php echo $lang->bug->legendAttatch;?></legend>
        <div class='form-group'><?php echo $this->fetch('file', 'buildform', 'filecount=2');?></div>
      </fieldset>
      <div class='actions'>
        <?php 
        echo html::submitButton();
        $browseLink = $app->session->bugList != false ? $app->session->bugList : inlink('browse', "productID=$bug->product");
        echo html::linkButton($lang->goback, $browseLink);
        ?>
      </div>
      <?php include '../../common/view/action.html.php';?>
    </div>
  </div>
  <div class='col-side'>
    <div class='main main-side'>
      <fieldset>
        <legend><?php echo $lang->bug->legendBasicInfo;?></legend>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->bug->product;?></th>
            <td><?php echo html::select('product', $products, $productID, "onchange=loadAll(this.value); class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->module;?></th>
            <td>
              <span id='moduleIdBox'><?php echo html::select('module', $moduleOptionMenu, $currentModuleID, "onchange='loadModuleRelated()' class='form-control'");?></span>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->productplan;?></th>
            <td>
              <span id="planIdBox"><?php echo html::select('plan', $plans, $bug->plan, "class='form-control'");?></span>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->type;?></th>
            <td><?php echo html::select('type', $lang->bug->typeList, $bug->type, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->severity;?></th>
            <td><?php echo html::select('severity', $lang->bug->severityList, $bug->severity, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->pri;?></th>
            <td><?php echo html::select('pri', $lang->bug->priList, $bug->pri, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->status;?></th>
            <td><?php echo html::select('status', $lang->bug->statusList, $bug->status, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->confirmed;?></th>
            <td><?php echo $lang->bug->confirmedList[$bug->confirmed];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->assignedTo;?></th>
            <td><?php echo html::select('assignedTo', $users, $bug->assignedTo, "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->os;?></th>
            <td><?php echo html::select('os', $lang->bug->osList, $bug->os, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->browser;?></th>
            <td><?php echo html::select('browser', $lang->bug->browserList, $bug->browser, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->keywords;?></th>
            <td><?php echo html::input('keywords', $bug->keywords, 'class="form-control"');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->mailto;?></th>
            <td><?php echo html::select('mailto[]', $users, str_replace(' ', '', $bug->mailto), 'class="form-control chosen" multiple');?></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <legend><?php echo $lang->bug->legendPrjStoryTask;?></legend>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->bug->project;?></th>
            <td><span id='projectIdBox'><?php echo html::select('project', $projects, $bug->project, 'class=form-control onchange=loadProjectRelated(this.value)');?></span></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->story;?></th>
            <td><div id='storyIdBox'><?php echo html::select('story', $stories, $bug->story, "class='form-control'");?></div>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->task;?></th>
            <td><div id='taskIdBox'><?php echo html::select('task', $tasks, $bug->task, "class='form-control'");?></div></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <legend><?php echo $lang->bug->legendLife;?></legend>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->bug->openedBy;?></th>
            <td><?php echo $users[$bug->openedBy];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->openedBuild;?></th>
            <td><span id='openedBuildBox'><?php echo html::select('openedBuild[]', $openedBuilds, $bug->openedBuild, 'size=4 multiple=multiple class="chosen form-control"');?></span></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->resolvedBy;?></th>
            <td><?php echo html::select('resolvedBy', $users, $bug->resolvedBy, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->resolvedDate;?></th>
            <td><?php echo html::input('resolvedDate', $bug->resolvedDate, 'class=form-control');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->resolvedBuild;?></th>
            <td><span id='resolvedBuildBox'><?php echo html::select('resolvedBuild', $resolvedBuilds, $bug->resolvedBuild, "class='form-control'");?></span></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->resolution;?></th>
            <td><?php echo html::select('resolution', $lang->bug->resolutionList, $bug->resolution, 'class=form-control onchange=setDuplicate(this.value)');?></td>
          </tr>
          <tr id='duplicateBugBox' <?php if($bug->resolution != 'duplicate') echo "style='display:none'";?>>
            <th><?php echo $lang->bug->duplicateBug;?></th>
            <td><?php echo html::input('duplicateBug', $bug->duplicateBug, 'class=form-control');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->closedBy;?></th>
            <td><?php echo html::select('closedBy', $users, $bug->closedBy, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->closedDate;?></th>
            <td><?php echo html::input('closedDate', $bug->closedDate, 'class=form-control');?></td>
          </tr>
        </table>
      </fieldset>
      <fieldset>
        <legend><?php echo $lang->bug->legendMisc;?></legend>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->bug->linkBug;?></th>
            <td><?php echo html::input('linkBug', $bug->linkBug, 'class="form-control"');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->bug->case;?></th>
            <td><?php echo html::input('case', $bug->case, 'class="form-control"');?></td>
          </tr>
        </table>
      </fieldset>
    </div>
  </div>
</div>
</form>
<?php include '../../common/view/footer.html.php';?>
