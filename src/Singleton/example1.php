<?php
include('../../libs/Bootstrap.php');

use \Config\Reader as ConfigReader;

$config_dev = ConfigReader::getInstance()->getData('development');
//...
//...
$config_prod = ConfigReader::getInstance()->getData('production');

print "This is development configuration" . PHP_EOL;
print_r($config_dev);

print "This is production configuration" . PHP_EOL;
print_r($config_prod);
