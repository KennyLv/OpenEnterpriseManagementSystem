<?php
/**
 * The setbasic view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='row'>
<?php foreach($lang->user->oauth->providers as $providerCode => $providerName):?>
<?php isset($this->config->oauth->$providerCode) ? $oauth = json_decode($this->config->oauth->$providerCode) : $oauth = '';?>
<div class='col-sm-6'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><i class="icon-<?php echo $providerCode; ?>"></i> <?php echo $providerName;?></strong>
      <div class='panel-actions'>
        <?php echo html::a($config->site->help[$providerCode], '<i class="icon-question-sign"></i> ' . $lang->site->oauthHelp, "target='_blank' class='btn btn-link'");?>
      </div>
    </div>
    <div class='panel-body'>
      <form method='post' id='<?php echo $providerCode;?>AjaxForm' class='form-horizontal'>
        <table class="table table-form">
          <tr>
            <th class='w-100px'><?php echo $lang->user->oauth->verification;?></th>
            <td class='w-p60'>
              <?php echo html::input('verification', isset($oauth->verification) ? $oauth->verification : '', "class='form-control'");?>
            </td><td></td>
          </tr>
          <tr>
            <th><?php echo $lang->user->oauth->{$providerCode}->clientID;?></th>
            <td>
              <?php echo html::input('clientID', isset($oauth->clientID) ? $oauth->clientID : '', "class='form-control'");?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->user->oauth->{$providerCode}->clientSecret;?></th>
            <td>
              <?php echo html::input('clientSecret', isset($oauth->clientSecret) ? $oauth->clientSecret : '', "class='form-control'");?>
            </td>
          </tr>
          <?php if($providerCode == 'sina'):?>
          <tr>
            <th><?php echo $lang->user->oauth->widget;?></th>
            <td><?php echo html::input('widget', isset($oauth->widget) ? $oauth->widget : '', "class='form-control'");?></td>
          </tr>
          <?php endif;?>
          <tr>
           <th></th> <td><?php echo html::submitButton() . html::hidden('provider', $providerCode);?></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>
</div>

<?php include '../../common/view/footer.admin.html.php';?>
