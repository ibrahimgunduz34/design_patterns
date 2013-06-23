<?php
namespace SalesRules;

class Coupon
{
    /**
     * @var float
     */
    private $_amount;
    
    /**
     * @var integer
     */
    private $_type;

    /**
     * @var string 
     */
    private $_code;
    
    /**
     * class constructor
     * @param array $data
     */
    public function __construct($data = array())
    {
        foreach($data as $key => $value) {
            if(property_exists($this, '_'. $key)) {
                $this->{'_' . $key} = $value;
            }
        }
    }

    /**
     * sets coupon  amount
     * @param float $amount
     * @return Coupon
     */
    public function setAmount($amount)
    {
        $this->_amount = $amount;
        return $this;
    }
    
    /**
     * sets coupon type
     * @param integer $type
     * @return Coupon
     */
    public function setType($type)
    {
        $this->_type = $type;
        return $this;
    }
    
    /**
     * sets coupon code.
     * @param string $code
     * @return Coupon
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }
    
    /**
     * returns coupon amount.
     * @return float
     */
    public function getAmount()
    {
        return $this->_amount;
    }
    
    /**
     * returns coupon type.
     * @return integer
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * returns coupon code.
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }
}
