<?php
/**
 * The error view file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     error
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='alert alert-danger'>
  <h3><?php echo $lang->error->pageNotFound;?></h3>
  <p><?php echo $this->config->company->desc;?></p>
</div>
<?php $this->fetch('sitemap', 'index', 'onlyBody=yes')?>
<?php include '../../common/view/footer.html.php';?>
