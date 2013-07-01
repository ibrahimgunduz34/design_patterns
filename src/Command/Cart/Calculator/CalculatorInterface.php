<?php
namespace Cart\Calculator;

interface CalculatorInterface
{
    /**
     * recalculates order.
     * 
     * @return \Order
     */
    public function recalculate();
}
