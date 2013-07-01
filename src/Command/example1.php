<?php
include('../../libs/Bootstrap.php');

use \Order;
use \SalesRules\Coupon;
use \SalesRules\Calculator as SalesRules;
use \Cart\Calculator;

//Creating a new Order.
$order = new Order(array('netTotal' => 250, 'taxRate' => 0.08));

//Creating a new coupon.
$coupon = new Coupon(array('code'   => 'hede', 
                           'type'   => SalesRules::DISCOUNT_TYPE_FIXED, 
                           'amount' => 10));

//binding coupon to order.
$order->setCoupon($coupon);

$calculator = new Calculator($order);
$result = $calculator->recalculate();

var_dump($result);
