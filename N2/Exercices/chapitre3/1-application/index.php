<?php

define('APP_ROOT', __DIR__ );
define('TPL_ROOT', APP_ROOT . "/templates");
require_once APP_ROOT . '/classes/Application.php';

$application = Application::getInstance();

$application->dispatch();
