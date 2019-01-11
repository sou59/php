<?php

define('APP_ROOT', __DIR__ );
require_once APP_ROOT . '/classes/Application.php';

$application = Application::getInstance();
$application->dispatch();
