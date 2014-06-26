<?php
/**
 * The announce block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<table class='table table-data table-hover table-fixed' id='oaBlockAnnounce'>
  <?php foreach($announces as $id => $announce):?>
  <tr>
    <td class='w-60px'><?php echo substr($announce->createdDate, 5, 5)?></td>
    <td><?php echo html::a($this->createLink('announce', 'view', "announceID=$id"), $announce->title, "data-toggle='modal'")?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$(function(){$.setAjaxModal();})</script>
