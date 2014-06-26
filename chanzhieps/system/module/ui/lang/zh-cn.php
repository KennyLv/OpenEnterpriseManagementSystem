<?php
/**
 * The ui module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->ui->common       = "站点";

$lang->ui->logo       = 'Logo';
$lang->ui->setLogo    = "Logo设置";
$lang->ui->setTheme   = '主题设置';
$lang->ui->setFavicon = "Favicon设置";

$lang->ui->setLogoFailed     = "设置Logo失败";
$lang->ui->noSelectedFile    = "没有选择图片";
$lang->ui->notAlloweFileType = "请选择正确的%s文件.";
$lang->ui->suitableLogoSize  = '最佳高度范围：50px~80px，最佳宽度范围：80px~240px';

$lang->ui->favicon = new stdclass();
$lang->ui->favicon->help  = "帮助";
$lang->ui->favicon->reset = "重置";

$lang->ui->themes = array();
$lang->ui->themes['default']    = '默认风格';
$lang->ui->themes['wide']       = '宽屏';
$lang->ui->themes['flat']       = '清泉';
$lang->ui->themes['tree']       = '蝉之树';
$lang->ui->themes['brightdark'] = '蝉憩';
$lang->ui->themes['tartan']     = '蝉之格';
$lang->ui->themes['blue']       = '蓝';
//$lang->ui->themes['colorful']   = array('name' => "缤纷 <span class='small text-warning'>支持自定义</span>", 'custom' => true, 'primaryColor' => '#D1270A', 'backColor' => '#FFFFFF', 'fontSize' => '14px', 'borderRadius' => '4px');

$lang->ui->changetheme                     = '点击来使用此主题';
$lang->ui->customtheme                     = '自定义主题';
$lang->ui->custom                          = '自定义…';
$lang->ui->themeSaved                      = '主题配置已保存';
$lang->ui->preview                         = '前台预览';
$lang->ui->theme = new stdclass();
$lang->ui->theme->primaryColor             = '基色';
$lang->ui->theme->backColor                = '背景';
$lang->ui->theme->fontSize                 = '字体';
$lang->ui->theme->borderRadius             = '圆角';
$lang->ui->theme->colorPlates              = '333333|000000|CA1407|45872B|148D00|F25D03|2286D2|D92958|A63268|04BFAD|D1270A|FF9400|299182|63731A|3D4DBE|7382D9|754FB9|F2E205|B1C502|364245|C05036|8A342A|E0DDA2|B3D465|EEEEEE|FFD0E5|D0FFFD|FFFF84|F4E6AE|E5E5E5|F1F1F1|FFFFFF';
$lang->ui->theme->fontSizeList['12px']     = '12px';
$lang->ui->theme->fontSizeList['13px']     = '13px';
$lang->ui->theme->fontSizeList['14px']     = '14px (默认)';
$lang->ui->theme->fontSizeList['15px']     = '15px';
$lang->ui->theme->fontSizeList['16px']     = '16px';
$lang->ui->theme->borderRadiusList['0']    = '0px';
$lang->ui->theme->borderRadiusList['2px']  = '2px';
$lang->ui->theme->borderRadiusList['4px']  = '4px (默认)';
$lang->ui->theme->borderRadiusList['5px']  = '5px';
$lang->ui->theme->borderRadiusList['6px']  = '6px';
$lang->ui->theme->borderRadiusList['8px']  = '8px';
$lang->ui->theme->borderRadiusList['12px'] = '12px';
$lang->ui->theme->borderRadiusList['16px'] = '16px';
$lang->ui->theme->borderRadiusList['20px'] = '20px';
