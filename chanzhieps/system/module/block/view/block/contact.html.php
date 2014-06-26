<?php
/**
 * The contact front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
$block->content = json_decode($block->content);
?>
<?php $contact = $this->loadModel('company')->getContact();?>
<div id="block<?php echo $block->id;?>" class='panel panel-block <?php echo $blockClass;?>'>
  <div class='panel-heading'>
    <strong><?php echo $icon . $block->title;?></strong>
    <?php if(!empty($block->content->moreText) and !empty($block->content->moreUrl)):?>
    <div class='pull-right'><?php echo html::a($block->content->moreUrl, $block->content->moreText);?></div>
    <?php endif;?>
  </div>
  <div class='panel-body'>
    <table class='table table-data'>
      <?php foreach($contact as $item => $value):?>
      <tr>
        <th><?php echo $this->lang->company->$item . $this->lang->colon;?></th>
        <td><?php echo $value;?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>
