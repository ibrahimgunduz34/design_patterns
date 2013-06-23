<?php
namespace SalesRules\Calculator;

interface CalculatorInterface
{
    /**
     * calculates discount amount.
     * @return float
     */
    public function calculate();
}
