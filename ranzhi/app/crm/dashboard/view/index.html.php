<?php
/**
 * The index view file of dashboard module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     dashboard
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php
include '../../common/view/header.html.php';
echo $this->fetch('block', 'dashboard', array('appName' => $appName), 'sys');
include '../../common/view/footer.html.php';
?>
