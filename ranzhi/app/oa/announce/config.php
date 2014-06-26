<?php
$config->announce->require = new stdclass();
$config->announce->require->create = 'categories, title, content';
$config->announce->require->edit   = 'categories, title, content';

$config->announce->editor = new stdclass();
$config->announce->editor->create = array('id' => 'content', 'tools' => 'full');
$config->announce->editor->edit   = array('id' => 'content', 'tools' => 'full');
