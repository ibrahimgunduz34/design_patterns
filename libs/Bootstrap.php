<?php

function handleError($errno, $errstr, $errfile, $errline, array $errcontext)
{
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }

    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler('handleError');


define('APPLICATION_PATH', dirname(__FILE__));

set_include_path(get_include_path() . PATH_SEPARATOR . 
                 APPLICATION_PATH . PATH_SEPARATOR .
                 APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . 
                    DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs');

require('Autoloader.php');
Autoloader::init();
