<?php
/**
 * The admin browse view file of slide module of chanzhiEPS.
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
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-picture'></i> <?php echo $lang->slide->admin;?></strong>
    <div class='panel-actions'>
      <?php echo html::a($this->inlink('create'), '<i class="icon-plus"></i> ' . $lang->slide->create, "class='btn btn-primary'");?>
    </div>
  </div>
  <form id='sortForm' action='<?php echo inLink('sort')?>' method='post'>
    <table class='table'>
      <tbody>
        <?php foreach($slides as  $key => $slide):?>
        <?php if($slide->backgroundType == 'color') $slide->height = $slide->height ? $slide->height : 180; ?>
        <tr class='text-middle'>
          <td>
            <?php echo html::hidden("order[{$slide->id}]", $key);?> 
            <div class='carousel slide mg-0'>
              <div class='carousel-inner'>
                <?php if ($slide->backgroundType == 'image'): ?>
                <div class='item active'>
                  <?php print(html::image($slide->image));?>
                <?php else: ?>
                <div class='item active' style='<?php echo 'background-color: ' . $slide->backgroundColor . '; height: ' . $slide->height . 'px';?>'>
                <?php endif ?>
                  <div class='carousel-caption'>
                    <h2 style='color:<?php echo $slide->titleColor;?>'><?php echo $slide->title;?></h2>
                    <div><?php echo $slide->summary;?></div>
                    <?php
                    foreach($slide->label as $key => $label):
                    if(trim($label) != '') echo html::a($slide->buttonUrl[$key], $label, "class='btn btn-lg btn-" . $slide->buttonClass[$key] . "'");
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td class='w-50px text-center'>
            <a href='javascript:;' class='btn btn-move-up btn-sm'><i class='icon-arrow-up'></i></a>
            <a href='javascript:;' class='btn btn-move-down btn-sm'><i class='icon-arrow-down'></i></a>
            <?php echo html::a($this->createLink('slide', 'edit', "id=$slide->id"), "<i class='icon-pencil'></i>", "class='btn btn-sm' title='{$lang->edit}'");?>
            <?php echo html::a($this->createLink('slide', 'delete', "id=$slide->id"), "<i class='icon-remove'></i>", "class='deleter btn btn-sm' title='{$lang->delete}'");?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
