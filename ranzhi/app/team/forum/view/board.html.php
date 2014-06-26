<?php 
/**
 * The browse view file of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contact 
 * @version     $Id: board.html.php 9841 2014-06-10 05:57:49Z daitingting $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php'; ?>
<?php include '../../../sys/common/view/treeview.html.php'; ?>
<?php js::set('boardID', $boardID);?>
<div class='row'>
  <div class='col-md-2'>
    <ul class="nav nav-primary nav-stacked">
      <?php foreach($boards as $parentBoard):?>
      <li class="nav-heading"><?php echo $parentBoard->name;?></li>
      <?php foreach($parentBoard->children as $childBoard):?>
      <li><?php echo html::a(inlink('board', "id=$childBoard->id"), $childBoard->name, "id='board{$childBoard->id}'");?></li>
      <?php endforeach;?>
      <?php endforeach;?>
    </ul>
  </div>
  <div class='col-md-10'>
    <?php $common->printPositionBar($board);?>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-comments-alt icon-large'></i>&nbsp;<?php echo $board->name; ?></strong>
        <?php if($board->moderators) printf(" &nbsp;<span class='moderators hidden-xxs'>" . $lang->forum->lblOwner . '</span>', trim($board->moderators, ',')); ?>
        <div class='panel-actions pull-right'>
          <?php if($this->forum->canPost($board)) echo html::a($this->createLink('thread', 'post', "boardID=$board->id"), '<i class="icon-pencil icon-large"></i>&nbsp;&nbsp;' . $lang->forum->post, "class='btn btn-primary'");?>
        </div>
      </div>
      <table class='table table-hover table-striped'>
        <thead>
          <tr class='text-center hidden-xxxs'>
            <th colspan='2'><?php echo $lang->thread->title;?></th>
            <th class='w-150px hidden-xxs'><?php echo $lang->thread->author;?></th>
            <th class='w-100px hidden-xs'><?php echo $lang->thread->postedDate;?></th>
            <th class='w-50px hidden-xs'><?php echo $lang->thread->views;?></th>
            <th class='w-50px'><?php echo $lang->thread->replies;?></th>
            <th class='w-200px hidden-sm hidden-xs'><?php echo $lang->thread->lastReply;?></th>
          </tr>  
        </thead>
        <tbody>
          <?php foreach($sticks as $thread):?>
          <tr class='text-center'>
            <td class='w-10px'><span class='sticky-thread text-danger'><i class="icon-comment-alt icon-large"></i></span></td>
            <td class='text-left'>
              <?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title);?>
              <?php echo "<span class='label label-danger'>{$lang->thread->stick}</span> "?>
            </td>
            <td class='hidden-xxs'><strong><?php echo $thread->authorRealname;?></strong></td>
            <td class='hidden-xs'><?php echo substr($thread->createdDate, 5, -3);?></td>
            <td class='hidden-xs'><?php echo $thread->views;?></td>
            <td class='hidden-xxxs'><?php echo $thread->replies;?></td>
            <td class='hidden-sm hidden-xs'>
              <?php 
              if($thread->replies)
              {
                  echo substr($thread->repliedDate, 5, -3) . ' ';
                  echo html::a($this->createLink('thread', 'locate', "threadID={$thread->id}&replyID={$thread->replyID}"), $thread->repliedByRealname);
              }
              ?>
            </td>  
          </tr>
          <?php unset($threads[$thread->id]);?>
          <?php endforeach;?>

          <?php foreach($threads as $thread):?>
          <tr class='text-center'>
            <td class='w-10px'><?php echo $thread->isNew ? "<span class='text-success'><i class='icon-comment-alt icon-large'></i></span>" : "<span class='text-muted'><i class='icon-comment-alt icon-large'></i></span>";?></td>
            <td class='text-left'><?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title);?></td>
            <td class='hidden-xxs'><strong><?php echo $thread->authorRealname;?></strong></td>
            <td class='hidden-xs'><?php echo substr($thread->createdDate, 5, -3);?></td>
            <td class='hidden-xs'><?php echo $thread->views;?></td>
            <td class='hidden-xxxs'><?php echo $thread->replies;?></td>
            <td class='hidden-sm hidden-xs'>
              <?php 
              if($thread->replies)
              {
                  echo substr($thread->repliedDate, 5, -3) . ' ';
                  echo html::a($this->createLink('thread', 'locate', "threadID={$thread->id}&replyID={$thread->replyID}"), $thread->repliedByRealname);
              }
              ?>
            </td>  
          </tr>  
          <?php endforeach;?>
        </tbody>
        <tfoot><tr><td colspan='7'><?php $pager->show('right', 'short');?></td></tr></tfoot>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
