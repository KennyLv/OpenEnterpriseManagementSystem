<?php 
/**
 * The vcard view of user module of ZenTaoMS.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     user 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<div class='modal-dialog' style='width:250px;'>
<?php echo html::image($this->createLink('misc', 'qrcode', "content={$vcard}"));?>
</div>
