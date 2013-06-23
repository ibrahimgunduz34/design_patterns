<?php
namespace SalesRules\Calculator;

use \SalesRules\Calculator\CalculatorInterface;
use \SalesRules\Calculator\CalculatorAbstract;

class Percent extends CalculatorAbstract implements CalculatorInterface
{
    public function calculate()
    {
        return $this->_orderTotal * (1 - ($this->_discountAmount / 100));
    }
}
