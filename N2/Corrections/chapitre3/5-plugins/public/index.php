<?php

define('APP_ROOT', __DIR__ . '/..');
require_once APP_ROOT . '/src/App/Application.php';

$application = \App\Application::getInstance();

//$application->addPlugin(new \App\Plugins\PluginGPC); version 5.4
$application->addPlugin(new \App\Plugins\PluginSession);
$application->addPlugin(new \App\Plugins\PluginAcl);
$application->addPlugin(new \App\Plugins\PluginLayout);

$application->dispatch();
