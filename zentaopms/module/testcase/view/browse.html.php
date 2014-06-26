<?php
/**
 * The browse view file of testcase module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     testcase
 * @version     $Id: browse.html.php 5108 2013-07-12 01:59:04Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php
include '../../common/view/header.html.php';
include '../../common/view/datepicker.html.php';
include '../../common/view/treeview.html.php';
js::set('browseType', $browseType);
js::set('moduleID'  , $moduleID);
js::set('confirmDelete', $lang->testcase->confirmDelete);
?>
<div id='featurebar'>
  <ul class='nav'>
    <?php
    echo "<li id='allTab'>"         . html::a($this->createLink('testcase', 'browse', "productid=$productID&browseType=all&param=0&orderBy=$orderBy&recTotal=0&recPerPage=200"), $lang->testcase->allCases) . "</li>";
    echo "<li id='needconfirmTab'>" . html::a($this->createLink('testcase', 'browse', "productid=$productID&browseType=needconfirm&param=0"), $lang->testcase->needConfirm) . "</li>";
    echo "<li id='bysearchTab' onclick=\"browseBySearch('$browseType')\"><a href='#'><i class='icon-search icon'></i>&nbsp;{$lang->testcase->bySearch}</a></li> ";
    ?>
  </ul>
  <div class='actions'>
    <div class='btn-group'>
      <div class='btn-group'>
        <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
          <i class='icon-download-alt'></i> <?php echo $lang->export ?>
          <span class='caret'></span>
        </button>
        <ul class='dropdown-menu' id='exportActionMenu'>
        <?php 
        $misc = common::hasPriv('testcase', 'export') ? "class='export'" : "class=disabled";
        $link = common::hasPriv('testcase', 'export') ?  $this->createLink('testcase', 'export', "productID=$productID&orderBy=$orderBy") : '#';
        echo "<li>" . html::a($link, $lang->testcase->export, '', $misc) . "</li>";

        $misc = common::hasPriv('testcase', 'exportTemplet') ? "class='export'" : "class=disabled";
        $link = common::hasPriv('testcase', 'exportTemplet') ?  $this->createLink('testcase', 'exportTemplet', "productID=$productID") : '#';
        echo "<li>" . html::a($link, $lang->testcase->exportTemplet, '', $misc) . "</li>";
        ?>
        </ul>
      </div>
      <?php 
      common::printIcon('testcase', 'import', "productID=$productID", '', 'button', '', '', 'export cboxElement iframe');
      common::printIcon('testcase', 'batchCreate', "productID=$productID&moduleID=$moduleID");
      common::printIcon('testcase', 'create', "productID=$productID&moduleID=$moduleID");
      ?>
    </div>
  </div>
  <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class='side' id='treebox'>
  <a class='side-handle' data-id='testcaseTree'><i class='icon-caret-left'></i></a>
  <div class='side-body'>
    <div class='panel panel-sm'>
      <div class='panel-heading nobr'><?php echo html::icon($lang->icons['product']);?> <strong><?php echo $productName;?></strong></div>
      <div class='panel-body'>
        <?php echo $moduleTree;?>
        <div class='text-right'>
          <?php common::printLink('tree', 'browse', "productID=$productID&view=case", $lang->tree->manage);?>
          <?php common::printLink('tree', 'fix',    "root=$productID&type=case", $lang->tree->fix, 'hiddenwin');?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='main'>
  <form id='batchForm' method='post'>
    <table class='table table-condensed table-hover table-striped tablesorter table-fixed' id='caseList'>
      <?php $vars = "productID=$productID&browseType=$browseType&param=$param&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
      <thead>
        <tr>
          <th class='w-id'>    <?php common::printOrderLink('id',            $orderBy, $vars, $lang->idAB);?></th>
          <th class='w-pri'>   <?php common::printOrderLink('pri',           $orderBy, $vars, $lang->priAB);?></th>
          <th>                 <?php common::printOrderLink('title',         $orderBy, $vars, $lang->testcase->title);?></th>
          <?php if($browseType == 'needconfirm'):?>
          <th>                 <?php common::printOrderLink('story',         $orderBy, $vars, $lang->testcase->story);?></th>
          <th class='w-50px'><?php echo $lang->actions;?></th>
          <?php else:?>
          <th class='w-type'>  <?php common::printOrderLink('type',          $orderBy, $vars, $lang->typeAB);?></th>
          <th class='w-user'>  <?php common::printOrderLink('openedBy',      $orderBy, $vars, $lang->openedByAB);?></th>
          <th class='w-80px'>  <?php common::printOrderLink('lastRunner',    $orderBy, $vars, $lang->testtask->lastRunAccount);?></th>
          <th class='w-120px'> <?php common::printOrderLink('lastRunDate',   $orderBy, $vars, $lang->testtask->lastRunTime);?></th>
          <th class='w-80px'>  <?php common::printOrderLink('lastRunResult', $orderBy, $vars, $lang->testtask->lastRunResult);?></th>
          <th class='w-status'><?php common::printOrderLink('status',        $orderBy, $vars, $lang->statusAB);?></th>
          <th class='w-150px {sorter:false}'><?php echo $lang->actions;?></th>
          <?php endif;?>
        </tr>
      </thead>
      <?php foreach($cases as $case):?>
      <tr class='text-center'>
        <?php $viewLink = inlink('view', "caseID=$case->id");?>
        <td>
          <input type='checkbox' name='caseIDList[]'  value='<?php echo $case->id;?>'/> 
          <?php echo html::a($viewLink, sprintf('%03d', $case->id));?>
        </td>
        <td><span class='<?php echo 'pri' . $case->pri?>'><?php echo $case->pri?></span></td>
        <td class='text-left' title="<?php echo $case->title?>"><?php echo html::a($viewLink, $case->title);?></td>
        <?php if($browseType == 'needconfirm'):?>
        <td class='text-left'><?php echo html::a($this->createLink('story', 'view', "storyID=$case->story"), $case->storyTitle, '_blank');?></td>
        <td><?php $lang->testcase->confirmStoryChange = $lang->confirm; common::printIcon('testcase', 'confirmStoryChange', "caseID=$case->id", '', 'list', '', 'hiddenwin');?></td>
        <?php else:?>
        <td><?php echo $lang->testcase->typeList[$case->type];?></td>
        <td><?php echo $users[$case->openedBy];?></td>
        <td><?php echo $users[$case->lastRunner];?></td>
        <td><?php if(!helper::isZeroDate($case->lastRunDate)) echo date(DT_MONTHTIME1, strtotime($case->lastRunDate));?></td>
        <td class='<?php echo $case->lastRunResult;?>'><?php if($case->lastRunResult) echo $lang->testcase->resultList[$case->lastRunResult];?></td>
        <td class='<?php if(isset($run)) echo $run->status;?>'><?php echo $lang->testcase->statusList[$case->status];?></td>
        <td class='text-right'>
          <?php
          common::printIcon('testtask', 'runCase', "runID=0&caseID=$case->id&version=$case->version", '', 'list', 'play', '', 'runCase iframe');
          common::printIcon('testtask', 'results', "runID=0&caseID=$case->id", '', 'list', 'flag-checkered', '', 'results iframe');
          common::printIcon('testcase', 'edit',    "caseID=$case->id", $case, 'list');
          common::printIcon('testcase', 'create',  "productID=$case->product&moduleID=$case->module&from=testcase&param=$case->id", $case, 'list', 'copy');

          if(common::hasPriv('testcase', 'delete'))
          {
              $deleteURL = $this->createLink('testcase', 'delete', "caseID=$case->id&confirm=yes");
              echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"caseList\",confirmDelete)", '<i class="icon-remove"></i>', '', "title='{$lang->testcase->delete}' class='btn-icon'");
          }

          common::printIcon('testcase', 'createBug', "product=$case->product&extra=caseID=$case->id,version=$case->version,runID=", $case, 'list', 'bug');
          ?>
        </td>
        <?php endif;?>
      </tr>
      <?php endforeach;?>
      <tfoot>
       <tr>
         <?php $mergeColums = $browseType == 'needconfirm' ? 5 : 10;?>
         <td colspan='<?php echo $mergeColums?>'>
           <?php if($cases):?>
           <div class='table-actions clearfix'>
             <div class='btn-group'>
               <?php echo html::selectButton();?>
             </div>
             <div class='btn-group dropup'>
               <?php
               $actionLink = $this->createLink('testcase', 'batchEdit', "productID=$productID");
               $misc       = common::hasPriv('testcase', 'batchEdit') ? "onclick=\"setFormAction('$actionLink')\"" : "disabled='disabled'";
               echo html::commonButton($lang->edit, $misc);
               ?>
               <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>
               <ul class='dropdown-menu' id='moreActionMenu'>
                <?php 
                $actionLink = $this->createLink('testtask', 'batchRun', "productID=$productID&orderBy=$orderBy");
                $misc = common::hasPriv('testtask', 'batchRun') ? "onclick=\"setFormAction('$actionLink')\"" : "class='disabled'";
                echo "<li>" . html::a('#', $lang->testtask->runCase, '', $misc) . "</li>";
                ?>
               </ul>
             </div>
           </div>
           <?php endif?>
           <div class='text-right'><?php $pager->show();?></div>
         </td>
       </tr>
     </tfoot>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
