<?php
include('../../libs/Bootstrap.php');

use \Payment\Factory;
use \Payment\Request;
use Event\BeforeRequestListener;
use Event\AfterRequestListener;

//creating new payment adapter instance
$instance = Factory::createInstance('Est');

//attaching listeners.
$instance->attachEventListener($instance::EVENT_BEFORE_REQUEST, new BeforeRequestListener());
$instance->attachEventListener($instance::EVENT_AFTER_REQUEST, new AfterRequestListener());
//creating payment request.
$request = new Request();
$request->setCardNumber('5406675406675403')
    ->setSecurityCode('000')
    ->setExpireYear(13)
    ->setExpireMonth(12)
    ->setAmount(10)
    ->setOrderId('ORD00000' . time() );

//performing payment transaction.

/*  @var $response \Payment\Response */    
$response = $instance->makeSale($request);

 if($response->isSuccess()) {
    echo "Payment is performed successfull" . PHP_EOL;
 } else {
    echo "An error occurred while performing payment." . PHP_EOL .
        "Detail:" . PHP_EOL .
        $response->getMessage() . PHP_EOL;
 }
