<?php
/**
 * The index view file of forum module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     forum
 * @version     $Id: index.html.php 9792 2014-06-05 09:04:03Z daitingting $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php'; ?>
<div id='boards'>
<?php foreach($boards as $parentBoard):?>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><i class='icon-comments icon-large'></i> <?php echo $parentBoard->name;?></strong>
    </div>
    <table class='table table-striped'>
      <tbody>
        <tr>
          <?php $count = count($parentBoard);?>
          <?php $i = 0;?>
          <?php foreach($parentBoard->children as $childBoard):?>
          <?php $i++;?>
          <td class='border' width='33%'>
            <table class='board'>
              <tbody>
                <tr class='board'>
                  <td>
                    <?php echo html::a(inlink('board', "id=$childBoard->id", "category={$childBoard->alias}"), $childBoard->name);?>
                    <?php if($childBoard->moderators[0]) printf(" &nbsp;<span class='moderators hidden-xxs'>" . $lang->forum->lblOwner . '</span>', trim(implode(',', $childBoard->moderators), ','));?>
                    <?php echo '(' . $lang->forum->threadCount . $lang->colon . $childBoard->threads . ' ' . $lang->forum->postCount . $lang->colon . $childBoard->posts . ')';?>
                  </td>
                </tr>
                <?php if($childBoard->desc):?>
                <tr class='board'><td><small class='text-muted'><?php echo $childBoard->desc;?></small></td></tr>
                <?php endif;?>
                <tr class='board'>
                  <td>
                    <?php 
                    if($childBoard->postedBy)
                    {
                        $postedDate = substr($childBoard->postedDate, 5, -3); 
                        $postedBy   =  html::a($this->createLink('thread', 'locate', "threadID={$childBoard->postID}&replyID={$childBoard->replyID}"), $childBoard->postedBy);;
                        echo sprintf($lang->forum->lastPost, $postedDate, $postedBy);
                    }
                    else
                    {
                        echo $lang->forum->noPost;
                    }
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <?php if(($i % 3) == 0) echo $i == $count ? "</tr>" : "</tr><tr>";?>
          <?php endforeach;?>
          <?php 
            if(($i % 3) == 1) echo "<td class='border'></td><td class='border'></td></tr>"; 
            if(($i % 3) == 2) echo "<td class='border'></td></tr>";
          ?>
        </tr>
      </tbody>
    </table>
  </div>
<?php endforeach;?>
</div>
<?php include '../../common/view/footer.html.php'; ?>
