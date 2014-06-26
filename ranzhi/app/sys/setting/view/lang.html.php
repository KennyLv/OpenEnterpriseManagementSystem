<?php
/**
 * The lang view file of setting module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     setting
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<form method='post' id='ajaxForm'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><i class='icon-wrench'></i> <?php echo $lang->setting->common; ?></strong>
    </div>
    <table class='table table-condensed'>
      <tr>
        <th class='w-150px text-center'><?php echo $lang->setting->key;?></th>
        <th class='w-300px'><?php echo $lang->setting->value;?></th>
        <th></th>
      </tr>
      <?php foreach($fieldList as $key => $value):?>
      <tr class='text-center'>
        <?php $system = isset($systemField[$key]) ? $systemField[$key] : 1;?>
        <td class='text-middle'><?php echo $key === '' ? 'NULL' : $key; echo html::hidden('keys[]', $key) . html::hidden('systems[]', $system);?></td>
        <td>
          <?php $readonly = ($module == 'product' and $field == 'statusList' and $system == 1) ? 'readonly' : ''; ?>
          <?php echo html::input("values[]", $value, "class='form-control' $readonly");?>
        </td>
        <td class='text-left text-middle'>
          <a href='javascript:;' class='btn btn-mini add'><i class='icon-plus'></i></a>
          <?php if(!$system):?><a href='javascript:;' class='btn btn-mini remove'><i class='icon-remove'></i></a><?php endif;?>
        </td>
      </tr>
      <?php endforeach;?>
      <tfoot>
        <tr>
          <td></td>
          <td colspan='2'>
          <?php 
          $scope = array('all' => $lang->setting->allLang, $clientLang => $lang->setting->currentLang);
          echo html::radio('lang', $scope, 'all');
          ?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
          <?php
          echo html::submitButton();
          echo html::a(inlink('reset', "module=$module&field=$field"), $lang->setting->reset, "class='btn deleter'");
          ?>
          </td>
          <td></td>
        </tr>
      </tfoot>
    </table>
  </div>
</form>
<?php
$placeholder = isset($lang->setting->placeholder->$field) ? $lang->setting->placeholder->$field : $lang->setting->placeholder->key; 
$itemRow = <<<EOT
  <tr class='text-center'>
    <td class='w-200px'>
      <input type='text' value="" name="keys[]" class='form-control' placeholder='{$placeholder}'>
      <input type='hidden' value="0" name="systems[]">
    </td>
    <td>
      <input type='text' value="" name="values[]" class='form-control' placeholder='{$lang->setting->placeholder->value}'>
    </td>
    <td class='text-left text-middle'>
      <a href='javascript:;' class='btn btn-mini add'><i class='icon-plus'></i></a>
      <a href='javascript:;' class='btn btn-mini remove'><i class='icon-remove'></i></a>
    </td>
  </tr>
EOT;
?>
<?php js::set('itemRow', $itemRow)?>
<?php js::set('module', $module)?>
<?php js::set('field', $field)?>
<?php include '../../common/view/footer.lite.html.php';?>
</body>
</html>
