<?php
/**
 * The project list block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<table class='table table-data table-hover block-depositor table-fixed'>
  <tr>
    <th class='w-160px'><?php echo $lang->depositor->title;?></th>
    <th><?php echo $lang->depositor->serviceProvider . '/' . $lang->depositor->bankProvider;?></th>
    <th class='w-130px'><?php echo $lang->depositor->account;?></th>
  </tr>
  <?php foreach($depositors as $id => $depositor):?>
  <tr>
    <td><?php echo $depositor->title;?></td>
    <?php if($depositor->type == 'bank'):?>
    <td><?php echo $depositor->provider;?></td>
    <?php else:?>
    <td><?php echo $lang->depositor->providerList[$depositor->provider];?></td>
    <?php endif;?>
    <td><?php echo $depositor->account;?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-depositor').dataTable();</script>
