<?php
include('../../libs/Bootstrap.php');

use \SalesRules\Coupon;
use \SalesRules\Calculator;

//Creating a new Order.
$order = new Order(array('netTotal' => 250));

//Creating a new coupon.
$coupon = new Coupon(array('code'   => 'hede', 
                           'type'   => Calculator::DISCOUNT_TYPE_PERCENT,
                           'amount' => 10));

$calculator = new Calculator($order->getNetTotal(), $coupon);
$discountedAmount = $calculator->calculate();

echo $discountedAmount; // output = 225

echo PHP_EOL; // for Line Feed.


