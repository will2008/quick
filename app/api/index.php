<?php
define('APP_PATH', __DIR__);

require("../../lib/quick/server.php");

\Quick\Server::run(function() {
    if (!\Quick\Core\Config::get('env_dev')) {
        \Quick\Server::exceptionHandler(function($exceptionObject){
            header('Content-Type: application/json; charset=' . \Quick\Core\App::instance()->get('charset'));
            echo json_encode(array('code'=> $exceptionObject->getCode(), 'msg'=>$exceptionObject->getMessage(), 'data'=>array()));
            exit;
        });
        \Quick\Server::errorHandler(function($code, $message, $errorFile, $errorLine) {
            header('Content-Type: application/json; charset=' . \Quick\Core\App::instance()->get('charset'));
            echo json_encode(array('code'=> $code, 'msg'=>$message, 'data'=>array()));
            exit;
        });
    }
});
