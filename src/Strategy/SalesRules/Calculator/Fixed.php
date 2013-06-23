<?php
namespace SalesRules\Calculator;

use \SalesRules\Calculator\CalculatorInterface;
use \SalesRules\Calculator\CalculatorAbstract;

class Fixed extends CalculatorAbstract implements CalculatorInterface
{   
    /**
     * @see \Calculator\CalculatorInterface::calculate()
     */
    public function calculate()
    {
        return $this->_orderTotal - $this->_discountAmount;
    }
}
