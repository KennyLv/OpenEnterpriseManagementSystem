<?php
/**
 * The footer view of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: footer.html.php 8260 2014-04-14 03:17:19Z guanxiying $
 * @link        http://www.ranzhi.org
 */
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
?>
  <footer id="footer" class="clearfix">
    <div id="footNav">
      <?php
      if(empty($this->config->links->index) && !empty($this->config->links->all)) echo "&nbsp;" . html::a($this->createLink('links', 'index'), '<i class="icon-heart"></i>' . $this->lang->link);
      ?>
    </div>
    <?php if(isset($config->company)):?>
    <span id="copyrightInfo">
    <?php echo "&copy; {$config->company->name} -" . date('Y') . '&nbsp;&nbsp;';?>
    </span>
    <?php endif;?>
    <div id="powerby">
      <?php printf($lang->poweredBy, $config->version, $config->version);?>
    </div>
  </footer>
<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);

/* Load hook files for current page. */
$extPath      = dirname(dirname(dirname(__FILE__))) . '/common/ext/view/';
$extHookRule  = $extPath . 'footer.front.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
?>
</div>
</body>
</html>
