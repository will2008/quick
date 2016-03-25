<?php
define('APP_PATH', __DIR__);

require(implode(DIRECTORY_SEPARATOR, [APP_PATH, 'conf', 'error_code.php']));
require(implode(DIRECTORY_SEPARATOR, [APP_PATH, 'conf', 'macros.php']));
require("../../lib/quick/server.php");

\Quick\Server::run(function() {
    if (!\Quick\Core\Config::get('env_dev')) {
        \Quick\Server::exceptionHandler(function($exceptionObject){
            header('Content-Type: application/json; charset=' . \Quick\Core\App::instance()->get('charset'));
            echo json_encode(array('c'=> $exceptionObject->getCode(), 'msg'=>$exceptionObject->getMessage()));
            exit;
        });
        \Quick\Server::errorHandler(function($code, $message, $errorFile, $errorLine) {
            header('Content-Type: application/json; charset=' . \Quick\Core\App::instance()->get('charset'));
            echo json_encode(array('c'=> $code, 'msg'=>$message));
            exit;
        });
    }
});
