<?php
$config->site->help['sina'] = 'http://www.chanzhi.org/book/chanzhieps/41.html';
$config->site->help['qq']   = 'http://www.chanzhi.org/book/chanzhieps/57.html';

global $app;
$config->site->ui = new stdclass();
$config->site->ui->customCssFile = $app->getDataRoot() . 'theme/custom.css';

$config->themeSetting = new stdclass();
$config->themeSetting->primaryColor = '#D1270A' ;
$config->themeSetting->backColor    = '#FFFFFF';
$config->themeSetting->borderRadius = '4px';
$config->themeSetting->fontSize     = '14px';
