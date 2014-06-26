<?php
/**
 * The create view file of wechat module of chanzhiEPS.
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
    <strong><i class="icon-plus"></i> <?php echo $lang->wechat->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p50'>
        <tr>
          <th class='w-100px'><?php echo $lang->wechat->type;?></th>
          <td><?php echo html::select('type', $lang->wechat->typeList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->name;?></th>
          <td><?php echo html::input('name', '', "class='form-control' placeholder='{$lang->wechat->placeholder->name}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->account;?></th>
          <td><?php echo html::input('account', '', "class='form-control' placeholder='{$lang->wechat->placeholder->account}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->token;?></th>
          <td><?php echo html::input('token', '', "class='form-control' placeholder='{$lang->wechat->placeholder->token}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->certified;?></th>
          <td><?php echo html::radio('certified', $lang->wechat->certifiedList, '0');?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
