<?php
/**
 * The create view file of slide of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan<guanxiying@xirangit.com>
 * @package     slide
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php
$colorPlates = '';
foreach (explode('|', $lang->slide->colorPlates) as $value)
{
    $colorPlates .= "<div class='color color-tile' data='#" . $value . "'><i class='icon-ok'></i></div>";
}
?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-plus'></i> <?php echo $lang->slide->create;?></strong></div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post' enctype='multipart/form-data'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->slide->title;?></th>
          <td class='w-p40'><?php echo html::input('title', '', "class='form-control'");?></td>
          <td>
            <div class='colorplate clearfix'>
              <div class='input-group color active' data='#FFF'>
                <?php echo html::input('titleColor', '#FFF', "class='form-control input-color text-latin' placeholder='" . $lang->slide->colorTip . "'");?>
                <span class='input-group-btn'>
                  <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'> <i class='icon icon-question'></i> <span class='caret'></span></button>
                  <div class='dropdown-menu colors'>
                    <?php echo $colorPlates; ?>
                  </div>
                </span>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->slide->mainLink;?></th>
          <td><?php echo html::input('mainLink', '', "class='form-control'");?></td><td colspan='2'></td>
        </tr>
        <tr>
          <th><?php echo $lang->slide->background->type;?></th>
          <td><?php echo html::radio('backgroundType', $lang->slide->background->typeList, 'image', "class='radio'");?></td>
        </tr>
        <tr class='bg-section' data-id='color'>
          <th><?php echo $lang->slide->background->color;?></th>
          <td colspan='2'>
            <div class='colorplate clearfix'>
              <div class='input-group color active' data='#114DAD'>
                <?php echo html::input('backgroundColor', '#114DAD', "class='form-control input-color text-latin' placeholder='" . $lang->slide->colorTip . "'");?>
                <span class='input-group-btn'>
                  <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
                    <i class='icon icon-question'></i> 
                    <span class='caret'></span>
                  </button>
                  <div class='dropdown-menu colors'>
                    <?php echo $colorPlates; ?>
                  </div>
                </span>
              </div>
            </div>
          </td>
        </tr>
        <tr class='bg-section' data-id='color'>
          <th><?php echo $lang->slide->height;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::input('height', '', "class='form-control'");?>
              <span class='input-group-addon'>px</span>
            </div>
          </td>
        </tr>
        <tr class='bg-section' data-id='image'>
          <th><?php echo $lang->slide->background->image;?></th>
          <td><?php echo html::file('files[]', "tabindex='-1' class='form-control'");?></td>
          <td colspan='2'><label class='text-info'><?php echo $lang->slide->suitableSize;?></label></td>
        </tr>
        <tr>
          <th><?php echo $lang->slide->button;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::input('label[0]', '', "class='form-control' placeholder='{$lang->slide->label}'");?>
              <div class='input-group-btn'>
                <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                  <?php echo $lang->slide->buttonColor;?> <span class='caret'></span>
                </button>
                <?php echo html::hidden('buttonClass[0]', 'primary');?>
                <div class='dropdown-menu buttons'>
                  <li><button type='button' data-id='default' class='btn btn-block'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='primary' class='btn btn-block btn-primary'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='warning' class='btn btn-block btn-warning'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='danger' class='btn btn-block btn-danger'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='success' class='btn btn-block btn-success'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='info' class='btn btn-block btn-info'><?php echo $lang->slide->label;?></button></li>
                </div>
              </div>
            </div>
          </td>
          <td><?php echo html::input('buttonUrl[0]', '', "class='form-control' placeholder='{$lang->slide->buttonUrl}'");?></td>
          <td><?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn btn-mini'") . html::a('javascript:;', "<i class='icon-remove'></i>", "class='delete btn-mini btn'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->slide->summary;?></th>
          <td colspan='3'><?php echo html::textarea('summary', '', "class='form-control' rows='6'");?></td>
        </tr>
        <tr>
          <td></td>
          <td colspan='3'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
  <table class='hide'>
    <tbody id='button'>
      <tr>
        <th><?php echo $lang->slide->button;?></th>
        <td>
          <div class='input-group'>
            <?php echo html::input('label[key]', '', "class='form-control' placeholder='{$lang->slide->label}'");?>
            <div class='input-group-btn'>
              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                <?php echo $lang->slide->buttonColor;?> 
                <span class='caret'></span>
              </button>
              <?php echo html::hidden('buttonClass[key]', 'primary');?>
              <div class='dropdown-menu buttons'>
                  <li><button type='button' data-id='default' class='btn btn-block'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='primary' class='btn btn-block btn-primary'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='warning' class='btn btn-block btn-warning'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='danger' class='btn btn-block btn-danger'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='success' class='btn btn-block btn-success'><?php echo $lang->slide->label;?></button></li>
                  <li><button type='button' data-id='info' class='btn btn-block btn-info'><?php echo $lang->slide->label;?></button></li>
                </div>
            </div>
          </div>
        </td>
        <td><?php echo html::input('buttonUrl[key]', '', "class='form-control' placeholder='{$lang->slide->buttonUrl}'");?></td>
        <td><?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn btn-mini'") . html::a('javascript:;', "<i class='icon-remove'></i>", "class='delete btn-mini btn'");?></td>
      </tr>
    </tbody>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
