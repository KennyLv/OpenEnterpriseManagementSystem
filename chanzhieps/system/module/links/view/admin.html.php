<?php
/**
 * The setLink view file of links module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     links
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-link'></i> <?php echo $lang->links->common;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->links->index;?></th> 
          <td><?php echo html::textarea('index', isset($this->config->links->index) ? $this->config->links->index : '', "class='area-1' rows='10'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->links->all;?></th> 
          <td><?php echo html::textarea('all', isset($this->config->links->all) ? $this->config->links->all : '', "class='area-1' rows='10'");?></td> 
        </tr>
        <tr>
          <th></th>
          <td>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
