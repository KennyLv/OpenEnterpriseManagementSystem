<?php
$config->tree->require = new stdclass();
$config->tree->require->edit = 'name';

$config->tree->editor = new stdclass();
$config->tree->editor->edit = array('id' => 'desc', 'tools' => 'simple');

$config->tree->systemModules  = ',admin,block,book,captcha,company,file,index,links,message,';
$config->tree->systemModules .= 'nav,product,rss,site,slide,thread,ui,user,article,blog,cache,';
$config->tree->systemModules .= 'common,error,forum,install,mail,misc,page,reply,setting,sitemap,tag,tree,upgrade,';
