<?php
namespace SalesRules\Calculator;

abstract class CalculatorAbstract
{
    /**
     * @var float
     */
    protected $_orderTotal;
     
    /**
     * @var float
     */ 
    protected $_discountAmount;
    
    /**
     * @param float $orderTotal
     * @param float $discountAmount
     */
    public function __construct($orderTotal, $discountAmount )
    {
        $this->_orderTotal = $orderTotal;
        $this->_discountAmount = $discountAmount;
    }
}
