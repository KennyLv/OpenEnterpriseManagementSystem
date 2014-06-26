<?php
/**
 * The thread block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<table class='table table-data table-hover table-fixed'>
  <thead>
    <tr class='text-center'>
      <th class='w-180px'><?php echo $lang->thread->title;?></th>
      <th class='w-70px'><?php echo $lang->thread->author;?></th>
      <th class='w-70px'><?php echo $lang->thread->postedDate;?></th>
      <th class='w-40px'><?php echo $lang->thread->views;?></th>
      <th class='w-40px'><?php echo $lang->thread->replies;?></th>
    </tr>  
  </thead>
  <tbody>
  <?php foreach($threads as $id => $thread):?>
    <tr class='text-center'>
      <td class='text-left'><?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title);?></td>
      <td><?php echo $thread->authorRealname;?></td>
      <td><?php echo substr($thread->createdDate, 5, -3);?></td>
      <td><?php echo $thread->views;?></td>
      <td><?php echo $thread->replies;?></td>
    </tr>  
  <?php endforeach;?>
  </tbody>
</table>
<script>$(function(){$.setAjaxModal();})</script>
