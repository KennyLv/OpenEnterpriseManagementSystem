<?php
$config->user->resetExpired = 3*86400;

$config->user->require = new stdclass();
$config->user->require->register = 'account,realname,email,password1';
$config->user->require->edit     = 'realname,email';

$config->user->default = new stdclass();
$config->user->default->module = RUN_MODE == 'front' ? 'user'    : 'admin';
$config->user->default->method = RUN_MODE == 'front' ? 'control' : 'index';

$config->user->recPerPage = new stdclass();
$config->user->recPerPage->thread = 10;
$config->user->recPerPage->reply  = 20;
