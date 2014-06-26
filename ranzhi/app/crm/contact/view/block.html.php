<?php 
/**
 * The contact List block file of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php foreach($contacts as $contact):?>
<div class='panel' <?php if($contact->left) echo "title='" . sprintf($lang->contact->leftAt, $contact->left) . "'";?>>
  <table class='table table-bordered table-contact'>
    <tr>
      <th class='w-120px text-center alert v-middle'>
        <span class="lead <?php if($contact->maker) echo 'text-red'?>"><?php echo $contact->realname;?></span>
        <?php if($contact->left):?>
        <span ><i class='icon-lock text-muted'></i></span>
        <?php endif;?>
        <div><?php echo $contact->dept . ' ' . $contact->title;?></div>
      </th>
      <td>
        <?php if($contact->phone or $contact->mobile) echo "<div><i class='icon-phone-sign'></i> $contact->phone $contact->mobile</div>";?>
        <?php if($contact->qq) echo "<div class='f-14'><i class='icon-qq'></i> $contact->qq</div>";?>
        <?php if($contact->email) echo "<div class='f-14'><i class='icon-envelope-alt'></i> $contact->email </div>";?>
      </td>
    </tr>
  </table>
</div>
<?php endforeach;?>
