<?php
/**
 * The chosen view of common module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: chosen.html.php 9669 2014-05-29 06:42:00Z sunhao $
 * @link        http://www.ranzhi.org
 */
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
css::import($jsRoot . 'jquery/chosen/min.css');
js::import($jsRoot . 'jquery/chosen/min.js');
?>

<script language='javascript'> 
$(document).ready(function()
{
    $(".chosen").chosen({no_results_text: '<?php echo $lang->noResultsMatch;?>', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
});
</script>
