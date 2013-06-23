<?php
define('APPLICATION_PATH', dirname(__FILE__));

set_include_path(get_include_path() . PATH_SEPARATOR . 
                 APPLICATION_PATH . PATH_SEPARATOR .
                 APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . 
                    DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs');

require('Autoloader.php');
Autoloader::init();
