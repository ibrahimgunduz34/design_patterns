<?php
include('../../libs/Bootstrap.php');

use \Payment\Factory;
use \Payment\Request;

$instance = Factory::createInstance('Posnet');

$request = new Request();
$request->setCardNumber('5406675406675403')
    ->setSecurityCode('000')
    ->setExpireYear(13)
    ->setExpireMonth(12)
    ->setAmount(10)
    ->setOrderId('ORD000001');
/*  @var $response \Payment\Response */    
$response = $instance->makeSale($request);

    
