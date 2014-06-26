<?php include '../../common/view/header.admin.html.php'; ?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-comments'></i> <?php echo $lang->reply->list;?></strong></div>
  <table class='table table-hover table-bordered table-striped' id='replyList'>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'><?php echo $lang->reply->id;?></th>
        <th><?php echo $lang->reply->content;?></th>
        <th class='w-120px'><?php echo $lang->reply->author;?></th>
        <th class='w-100px'><?php echo $lang->reply->addedDate;?></th>
        <th class='w-80px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($replies as $reply):?>
      <tr class='text-center'>
        <td><?php echo $reply->id;?></td>
        <td class='text-left'>
          <?php 
          echo html::a(commonModel::createFrontLink('thread', 'locate', "threadID={$reply->thread}&replyID={$reply->id}"), $reply->content, "target=_blank");
          ?>
        </td>
        <td><?php echo $reply->authorRealname;?></td>
        <td><?php echo substr($reply->addedDate, 5, -3);?></td>
        <td>
          <?php echo html::a($this->createLink('reply', 'delete', "replyID=$reply->id"), $lang->delete, "class='reloadDeleter'"); ?>
        </td>
      </tr>  
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php'; ?>
