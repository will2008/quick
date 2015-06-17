<?php
\Quick\Core\Config::load(CONF_PATH . DS . 'cache.php');
\Quick\Core\Config::load(CONF_PATH . DS . 'database.php');

return [
    'logger' => [
        'level' => \Quick\Core\Logger::DEBUG,
        'prefix' => 'quick_example'
    ],
    'timezone' => 'Asia/Shanghai',
    'charset' => 'UTF-8',
    'session_enable' => FALSE,
    'env_dev' => TRUE,
    'serialize' => 'json'
];