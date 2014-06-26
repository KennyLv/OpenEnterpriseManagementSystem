<?php 
/**
 * The reply view file of wechat of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     wechat 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<div class='modal-dialog w-700px'>
  <div class='modal-content'>
    <div class='modal-header'>
      <?php echo html::closeButton();?>
      <h4 class='modal-title'><i class="icon-mail-reply"></i> <?php echo $lang->wechat->message->reply;?></h4>
    </div>
    <div class='modal-body'>
      <div id='recordsBox' class='comments-list'>
        <?php foreach($records as $record):?>
          <div class='comment' id="record<?php echo $record->id?>">
            <div class='content'>
              <div class='author text-primary'><span><?php echo $user->nickname;?></span> <small>[<?php echo $record->time;?>]</small></div>
              <div class='text'><span class='text-important'><?php echo $lang->wechat->message->typeList[$record->type] ?></span> &nbsp; <?php echo nl2br($record->content);?></div>
            </div>
          </div>
          <?php if(isset($record->replies)):?>
          <?php foreach($record->replies as $reply):?>
            <div class='comment comment-reply'>
              <div class='content'>
                <div class='author text-success'><span><?php echo $reply->from;?></span> <small>[<?php echo $reply->time;?>]</small></div>
                <div class='text'><?php echo nl2br($reply->content);?></div>
              </div>
            </div>
          <?php endforeach;?>
          <?php endif;?>
        <?php endforeach;?>
      </div>
      <?php if($public->certified):?>
      <form method='post' action="<?php echo inlink('reply', "messge={$message->id}");?>" id='ajaxForm'>
        <?php echo html::hidden('referer', $this->server->http_referer); ?>
        <div id='replyBox'>
          <?php echo html::textarea('content', '', "class='form-control' rows=2");?>
          <?php echo html::submitButton($lang->wechat->message->reply);?>
        </div>
      </form>
      <?php endif;?>
    </div>
  </div>
</div>
<?php if(isset($pageJS)) js::execute($pageJS);?>
