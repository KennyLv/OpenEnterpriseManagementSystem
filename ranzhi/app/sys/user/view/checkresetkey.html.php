<?php
/**
 * The checkresetkey view file of user module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user 
 * @version     $Id: checkresetkey.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<section id="check">
  <div class="box-radius">
    <div class="panel panel-default">
      <div class="panel-heading"><h4><strong><?php echo $lang->user->changePassword;?></strong></h4></div>
      <div class="panel-body">
        <form method='post' id='ajaxForm'>
          <table> 
            <tr>
              <th class='w-100px'><?php echo $lang->user->password;?></th>
              <td><?php echo html::password('password1', '', "class='text-box'");?></td>
            </tr>  
            <tr>
              <th><?php echo $lang->user->password2;?></th>
              <td><?php echo html::password('password2', '', "class='text-box'");?></td>
            </tr>
            <tr>
              <th></th>
              <td><?php echo html::submitButton($lang->user->submit,'btn btn-primary btn-block') . html::hidden('resetKey', $resetKey);?></td>
            </tr>
          </table>
        </form>
      </div>
    </div>  
  </div>
</section>
<?php include '../../common/view/footer.html.php';?>
