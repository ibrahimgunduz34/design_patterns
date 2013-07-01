<?php
namespace Cart;

use \Order;

class Calculator
{
    /**
     * @var array
     */
    private $_calculators = Array('Discount',
                                  'Tax',
                                  'GrandTotal',);
    
    /**
     * @var \Order
     */
    private $_order;
    
    /**
     * class constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->_order = $order;
    }

    /**
     * returns instance of the name specified calculator.
     * 
     * @param string $name
     * @return \Cart\Calculator\CalculatorInterface
     */
    private function _getCalculator($name)
    {
        $className = sprintf('\\Cart\Calculator\\%s', $name);
        if( ! class_exists($className, true) ) {
            throw new Exception('Unknown calculator:' . $name);
        }
        return new $className($this->_order);
    }
    
    /**
     * recalculates all order.
     *
     * @return \Order
     */
    public function recalculate()
    {
        foreach($this->_calculators as $calculatorName) {
            $calculator = $this->_getCalculator($calculatorName);
            $calculator->recalculate();
        }
        return $this->_order;
    }
}
