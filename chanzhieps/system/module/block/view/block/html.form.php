<?php
/**
 * The html block form view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 ?ൺϢ????????Ϣ???޹?˾ (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php $config->block->editor->blockform =  array('id' => 'content', 'tools' => 'full', 'filterMode' => false); ?>
<?php include '../../common/view/kindeditor.html.php';?>
<tr>
  <th><?php echo $lang->block->content;?></th>
  <td><?php echo html::textarea('content', isset($block) ? $block->content->content : '', 'rows=20 class=form-control');?></td>
</tr>
