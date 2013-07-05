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
/**
output:

object(Order)#1 (7) {
    ["_id":"Order":private]=>NULL
    ["_netTotal":"Order":private]=>int(250)
    ["_taxRate":"Order":private]=>float(0.08)
    ["_taxAmount":"Order":private]=>float(19.2)
    ["_discountAmount":"Order":private]=>int(10)
    ["_coupon":"Order":private]=>object(SalesRules\Coupon)#2 (3) {
        ["_amount":"SalesRules\Coupon":private]=>int(10)
        ["_type":"SalesRules\Coupon":private]=>int(1)
        ["_code":"SalesRules\Coupon":private]=>string(4) "hede"
    }
    ["_grandTotal":"Order":private]=>float(259.2)
}

*/
