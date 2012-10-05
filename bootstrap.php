<?php

// The current directory should be changed to composer project root,
// to make possible correct auto-loading process
chdir(__DIR__);

if (!file_exists('vendor/autoload.php')) {
    echo 'The project dependencies are not installed yet. Please run composer install in the project root to complete the installation.';
    exit;
}

$application = Zend\Mvc\Application::init(include 'config/application.config.php');
