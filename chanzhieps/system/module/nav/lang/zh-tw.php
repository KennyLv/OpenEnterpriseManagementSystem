<?php
/**
 * The common simplified chinese file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青島息壤網絡信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      DaiTingting 
 * @package     chanzhiEPS
 * @version     $Id$
 * @link        http://www.zentao.net
 */

$lang->nav->setNav   = '導航設置';
$lang->nav->add      = '添加';
$lang->nav->addChild = '添加子導航';
$lang->nav->delete   = '刪除導航';

$lang->nav->inputUrl        = '請輸入連結';
$lang->nav->inputTitle      = '請輸入標題';
$lang->nav->cannotRemoveAll = '不能刪除所有導航';

/* nav type   */
$lang->nav->types['system']  = '系統模組';
$lang->nav->types['article'] = '文章類目';
$lang->nav->types['product'] = '產品類目';
$lang->nav->types['page']    = '單頁';
$lang->nav->types['custom']  = '自定義';

/* common navs.*/
$lang->nav->system = new stdclass();
$lang->nav->system->home    = '首頁';
$lang->nav->system->company = '關於我們';
$lang->nav->system->forum   = '論壇';
$lang->nav->system->blog    = '博客';
$lang->nav->system->book    = '手冊';
$lang->nav->system->message = '留言';

/* Targets setting. */
$lang->nav->newWindow = new stdclass();
$lang->nav->newWindow->_blank = '新開窗口';
