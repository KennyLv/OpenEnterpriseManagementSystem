<?php
/**
 * The side view file of thread module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     thread
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='col-md-2'>
  <ul class="nav nav-primary nav-stacked">
    <?php foreach($boards as $parentBoard):?>
    <li class="nav-heading"><?php echo $parentBoard->name;?></li>
    <?php foreach($parentBoard->children as $childBoard):?>
    <li><?php echo html::a($this->createLink('forum', 'board', "id=$childBoard->id"), $childBoard->name, "id='board{$childBoard->id}'");?></li>
    <?php endforeach;?>
    <?php endforeach;?>
  </ul>
</div>
