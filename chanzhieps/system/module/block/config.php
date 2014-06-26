<?php
$config->block->allowedTags = $config->allowedTags->admin . '<script><style><object><param><embed><form><button>';

$config->block->editor = new stdclass();
$config->block->editor->create = array('id' => 'content', 'tools' => 'full');
$config->block->editor->edit   = array('id' => 'content', 'tools' => 'full');

$config->block->require = new stdclass();
$config->block->require->create = 'title';
$config->block->require->edit   = 'title';

$config->block->defaultIcons = array();
$config->block->defaultIcons['about']         = 'icon-group';
$config->block->defaultIcons['html']          = '';
$config->block->defaultIcons['contact']       = 'icon-phone';
$config->block->defaultIcons['links']         = 'icon-link';

$config->block->defaultIcons['latestArticle'] = 'icon-list-ul';
$config->block->defaultIcons['hotArticle']    = 'icon-list-ul';

$config->block->defaultIcons['latestProduct'] = 'icon-th';
$config->block->defaultIcons['hotProduct']    = 'icon-th';

$config->block->defaultIcons['articleTree']   = 'icon-folder-close';
$config->block->defaultIcons['productTree']   = 'icon-folder-close';
$config->block->defaultIcons['blogTree']      = 'icon-folder-close';

$config->block->defaultMoreUrl['html']          = '';
$config->block->defaultMoreUrl['latestArticle'] = '';
$config->block->defaultMoreUrl['hotArticle']    = '';
$config->block->defaultMoreUrl['latestProduct'] = '';
$config->block->defaultMoreUrl['hotProduct']    = '';
$config->block->defaultMoreUrl['about']         = commonModel::createFrontLink('company', 'index');
$config->block->defaultMoreUrl['contact']       = commonModel::createFrontLink('company', 'index');
