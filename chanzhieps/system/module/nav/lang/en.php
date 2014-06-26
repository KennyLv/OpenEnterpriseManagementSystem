<?php
/**
 * The common simplified chinese file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      DaiTingting 
 * @package     chanzhiEPS
 * @version     $Id$
 * @link        http://www.zentao.net
 */

$lang->nav->setNav   = 'Navigation';
$lang->nav->add      = 'Add';
$lang->nav->addChild = 'Child';
$lang->nav->delete   = 'Delete';

$lang->nav->inputUrl        = 'Please input url.';
$lang->nav->inputTitle      = 'Please input title.';
$lang->nav->cannotRemoveAll = 'Can not remove all navigation.';

/* nav type   */
$lang->nav->types['system']  = 'System modules';
$lang->nav->types['article'] = 'Article categories';
$lang->nav->types['product'] = 'Product categories';
$lang->nav->types['page']    = 'Pages';
$lang->nav->types['custom']  = 'Custom';

/* common navs.*/
$lang->nav->system = new stdclass();
$lang->nav->system->home    = 'Home';
$lang->nav->system->company = 'About';
$lang->nav->system->forum   = 'Forum';
$lang->nav->system->blog    = 'Blog';
$lang->nav->system->book    = 'Book';
$lang->nav->system->message = 'Inquire';

/* Targets setting. */
$lang->nav->newWindow = new stdclass();
$lang->nav->newWindow->_blank = 'New window';
