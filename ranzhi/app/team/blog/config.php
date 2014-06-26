<?php
$config->blog->require = new stdclass();
$config->blog->require->create = 'categories, title, content';
$config->blog->require->edit   = 'categories, title, content';

$config->blog->editor = new stdclass();
$config->blog->editor->create = array('id' => 'content', 'tools' => 'full');
$config->blog->editor->edit   = array('id' => 'content', 'tools' => 'full');
