<?php
/**
 * Application configuration file
 *
 */
return array(
    'modules' => include __DIR__. 'modules.config.php',
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);