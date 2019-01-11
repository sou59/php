<?php

define('APP_ROOT', __DIR__ . '/../');
require_once APP_ROOT . '/src/App/Application.php';

$application = \App\Application::getInstance();
$application->registerPlugins(
    array(
        'PluginGPC',
        'PluginSession',
        'PluginAcl',
        'PluginLayout'
    )
);
$application->dispatch();
