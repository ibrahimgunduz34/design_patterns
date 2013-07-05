<?php
namespace Cart\Calculator;

use \Order;

abstract class CalculatorAbstract
{
    /**
     * @var \Order
     */
    protected $_order;
    
    /**
     * class constructor
     *
     * @param \Order $order
     */
    public function __construct(Order $order)
    {
        $this->_order = $order;
    }
}
