<?php
namespace Cart\Calculator;

use \Order;
use \Cart\Calculator\CalculatorInterface;
use \Cart\Calculator\CalculatorAbstract;
use \SalesRules\Calculator as CouponCalculator;

class Discount extends CalculatorAbstract implements CalculatorInterface
{
    /**
     * @see \Cart\Calculator\CalculatorInterface::recalculate()
     */
    public function recalculate()
    {
        $order            = $this->_order;
        $coupon           = $order->getCoupon();
        $netTotal         = $order->getNetTotal();
        $couponCalculator = new CouponCalculator($netTotal, $coupon);
        $discountedPrice  = $couponCalculator->calculate();
        $discountAmount   = $netTotal - $discountedPrice;
        $order->setDiscountAmount($discountAmount);
        return $order;
    }
}
