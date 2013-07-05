<?php
namespace Cart\Calculator;

use \Order;
use \Cart\Calculator\CalculatorInterface;
use \Cart\Calculator\CalculatorAbstract;

class GrandTotal extends CalculatorAbstract implements CalculatorInterface
{
    /**
     * @see \Cart\Calculator\CalculatorInterface::recalculate()
     */
    public function recalculate()
    {
        $order      = $this->_order;
        $grandTotal = ($order->getNetTotal() - $order->getDiscountAmount()) + 
                        $order->getTaxAmount();
        $order->setGrandTotal($grandTotal);
        return $order;
    }
}
