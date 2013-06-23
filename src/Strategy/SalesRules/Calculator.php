<?php
namespace SalesRules;

use \SalesRules\Calculator\Fixed;
use \SalesRules\Calculator\Percent;
use \SalesRules\Exception\UnknownDiscountType;
use \SalesRules\Coupon;

class Calculator
{
    const DISCOUNT_TYPE_FIXED = 1;
    const DISCOUNT_TYPE_PERCENT = 2;

    private $_calculator;

    /**
     * class constructor
     * @param float $orderTotal
     * param \Coupon $coupon
     */
    public function __construct($orderTotal, Coupon $coupon)
    {
        switch($coupon->getType()) {
            case self::DISCOUNT_TYPE_FIXED:
                $this->_calculator = new Fixed($orderTotal, $coupon->getAmount());
                break;
            case self::DISCOUNT_TYPE_PERCENT:
                $this->_calculator = new Percent($orderTotal, $coupon->getAmount());
                break;
            default:
                throw new UnknownDiscountType("Unknown discount type:" . $coupon->getType());
        }
    }
    
    /**
     * calculates discounted amount by the strategy.
     * @return float
     */
    public function calculate()
    {
        return $this->_calculator->calculate();
    }
}
