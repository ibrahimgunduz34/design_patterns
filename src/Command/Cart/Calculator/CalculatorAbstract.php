<?php
namespace Cart\Calculator;

use \Order;

abstract class CalculatorAbstract
{
    protected $_order;

    public function __construct(Order $order)
    {
        $this->_order = $order;
    }
}
