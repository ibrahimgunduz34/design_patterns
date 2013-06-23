<?php
include('../../libs/Bootstrap.php');

use \SalesRules\Coupon;
use \SalesRules\Calculator;
use \Order;

//Creating a new Order.
$order = new Order(array('netTotal' => 250));

//Creating a new coupon.
$coupon = new Coupon(array('code'   => 'hede', 
                           'type'   => Calculator::DISCOUNT_TYPE_FIXED, 
                           'amount' => 10));

$calculator = new Calculator($order->getNetTotal(), $coupon);
$discountedAmount = $calculator->calculate();

echo $discountedAmount; // output = 240

echo PHP_EOL; // for Line Feed.


