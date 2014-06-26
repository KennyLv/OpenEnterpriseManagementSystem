<?php
/**
 * The integrate view file of wechat module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong class='text-info'><i class="icon-plus-sign"></i> <?php echo $lang->wechat->integrateInfo;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' action="<?php echo inlink('edit', "publicID={$public->id}");?>">
      <table class='table table-form w-p50'>
       <tr>
          <th><?php echo $lang->wechat->token;?></th>
          <td><?php echo $public->token;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->url;?></th>
          <td><?php echo $public->url;?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton($lang->wechat->integrateDone);?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
