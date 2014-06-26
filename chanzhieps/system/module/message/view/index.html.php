<?php
/**
 * The index view file of message module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     message
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php $common->printPositionBar();?>
<div class='row'>
  <div class='col-md-9'>
    <div class='panel'>
      <div class='panel-heading'><div class='panel-actions'><a href='#commentForm' class='btn btn-primary'><i class='icon-comment-alt'></i> <?php echo $lang->message->post; ?></a></div><strong><i class='icon-comments-alt'></i> <?php echo $lang->message->list;?> (<?php echo $pager->recTotal;?>)</strong></div>
      <div class='panel-body'>
        <?php if(!empty($messages)):?>
        <div class='comments-list'>
        <?php foreach($messages as $number => $message):?>
          <div class='comment' id="comment<?php echo $message->id?>">
            <div class='content clearfix'>
              <div class='text'>
                <span class='author'>
                  <strong><i class='icon-user text-muted'></i> <?php echo $message->from;?></strong>
                </span> 
                <small>(<?php echo formatTime($message->date, 'Y-m-d H:i');?>)<?php echo $lang->colon;?></small>&nbsp;
                <p><?php echo nl2br($message->content);?></p>
              </div>
            </div>
            <?php if(!empty($replies[$message->id])):?>
            <div class='comment'>
              <?php foreach($replies[$message->id] as $reply):?>
              <div class='content clearfix'>
                <div class='reply-box radius'>
                  <span class='author'>
                    <strong><i class='icon-user'></i> <?php echo $reply->from;?></strong> <small>(<?php echo formatTime($reply->date, 'Y-m-d H:i');?>)</small><?php echo $lang->colon?>
                  </span> 
                  &nbsp;<?php echo nl2br($reply->content);?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif;?>
          </div>
        <?php endforeach; ?>
        </div>
        <?php endif;?>
        <div class='pager clearfix'><?php $pager->show('right', 'short');?></div>
      </div>
    </div>

    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-comment-alt'></i> <?php echo $lang->message->post;?></strong></div>
      <div class='panel-body'>
        <form method='post' class='form-horizontal' id='commentForm' action="<?php echo $this->createLink('message', 'post', 'type=message');?>">
          <?php
          $from  = $this->session->user->account == 'guest' ? '' : $this->session->user->realname;
          $phone = $this->session->user->account == 'guest' ? '' : $this->session->user->phone;
          $qq    = $this->session->user->account == 'guest' ? '' : $this->session->user->qq;
          $email = $this->session->user->account == 'guest' ? '' : $this->session->user->email; 
          ?>
          <div class='form-group'>
            <label for='from' class='col-sm-1 control-label'><?php echo $lang->message->from; ?></label>
            <div class='col-sm-5 required'>
              <?php echo html::input('from', $from, "class='form-control'"); ?>
            </div>
          </div>
          <div class='form-group'>
            <label for='phone' class='col-sm-1 control-label'><?php echo $lang->message->phone; ?></label>
            <div class='col-sm-5'>
              <?php echo html::input('phone', $phone, "class='form-control'"); ?>
            </div>
            <div class='col-sm-6'><div class='help-block'><small class='text-important'><?php echo $lang->message->contactHidden;?></small></div></div>
          </div>
          <div class='form-group'>
            <label for='qq' class='col-sm-1 control-label'><?php echo $lang->message->qq;?></label>
             <div class='col-sm-5'>
              <?php echo html::input('qq', $qq, "class='form-control'"); ?>
            </div>
          </div>
          <div class='form-group'>
            <label for='email' class='col-sm-1 control-label'><?php echo $lang->message->email;?></label>
            <div class='col-sm-5'><?php echo html::input('email', $email, "class='form-control'"); ?></div>
          </div>
          <div class='form-group'>
            <label for='content' class='col-sm-1 control-label'><?php echo $lang->message->content;?></label>
            <div class='col-sm-11 required'>
              <?php 
                echo html::textarea('content', '', "class='form-control' rows='3'");
                echo html::hidden('objectType', 'message');
                echo html::hidden('objectID', 0);
              ?>
            </div>
          </div>
          <div class='form-group hiding' id='captchaBox'></div>
          <div class='form-group'>
            <div class='col-sm-1'></div>
            <div class='col-sm-11'><label class='checkbox'><input type='checkbox' name='secret' value='1' /><?php echo $lang->message->secret;?></label></div>
          </div>
          <div class='form-group'>
            <div class='col-sm-1'></div>
            <div class='col-sm-11 col-sm-offset-1'>
              <span><?php echo html::submitButton();?></span>
              <span><small class="text-important"><?php echo $lang->message->needCheck;?></small></span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class='col-md-3'><?php $this->block->printRegion($layouts, 'message_index', 'side');?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
