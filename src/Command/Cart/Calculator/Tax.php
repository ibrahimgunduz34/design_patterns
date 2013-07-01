<?php
namespace Cart\Calculator;

use \Order;
use \Cart\Calculator\CalculatorInterface;
use \Cart\Calculator\CalculatorAbstract;

class Tax extends CalculatorAbstract implements CalculatorInterface
{
    /**
     * @see \Cart\Calculator\CalculatorInterface::recalculate()
     */
    public function recalculate()
    {
        $order          = $this->_order;
        $netTotal       =  $order->getNetTotal();
        $taxRate        =  $order->getTaxRate();
        $discountAmount =  $order->getDiscountAmount();
        $taxAmount      = ($netTotal - $discountAmount) * $taxRate;
        $order->setTaxAmount($taxAmount);
        return $order;
    }
}
