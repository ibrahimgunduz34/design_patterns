<?php
class Order
{
    /**
     * @var integer
     */
    private $_id;

    /**
     * @var float
     */
    private $_netTotal;

    /**
     * @var float
     */
    private $_taxRate;

    /**
     * @var float
     */
    private $_taxAmount;

    /**
     * @var float
     */
    private $_discountAmount;

    /**
     * @var float
     */
    private $_grandTotal;

    /**
     * @var \Coupon
     */
    private $_coupon;
    
    /**
     * class constructor
     *
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
     * sets identity of order.
     *
     * @param integer $id
     * @return Order
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * sets net total.
     *
     * @param float $netTotal
     * @return Order
     */
    public function setNetTotal($netTotal)
    {
        $this->_netTotal = $netTotal;
        return $this;
    }


    /**
     * sets discount amount
     *
     * @param float $discountAmount
     * @return Order
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->_discountAmount = $discountAmount;
        return $this;
    }
    
    /**
     * sets tax rate.
     * 
     * @param float $taxRate
     * @return Order
     */
    public function setTaxRate($taxRate)
    {
        $this->_taxRate =  $taxRate;
        return $this;
    }
    
    /**
     * sets tax amount
     * 
     * @param float $taxAmount
     * @return Order
     */
    public function setTaxAmount($taxAmount)
    {
        $this->_taxAmount = $taxAmount;
        return $this;
    }
    
    /**
     * sets grand total.
     *
     * @param float $grandTotal
     * @return Order
     */
    public function setGrandTotal($grandTotal)
    {
        $this->_grandTotal = $grandTotal;
        return $this;
    }

    /**
     * sets coupon.
     *
     * @param \SalesRules\Coupon $coupon
     * @return Order
     */
    public function setCoupon(\SalesRules\Coupon $coupon)
    {
        $this->_coupon = $coupon;
        return $this;
    }

    /**
     * returns identity of order.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * returns net total
     *
     * @return float
     */
    public function getNetTotal()
    {
        return $this->_netTotal;
    }

    
    /**
     * returns discount amount.
     *
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->_discountAmount;
    }
    
    /**
     * returns tax rate.
     *
     * @return float
     */
    public function getTaxRate()
    {
        return $this->_taxRate;
    }
    
    /**
     * returns tax amount.
     *
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->_taxAmount;
    }
    
    /**
     * returns grand total.
     *
     * @return string
     */
    public function getGrandTotal()
    {
        return $this->_grandTotal;
    }
    
    /**
     * returns coupon
     * 
     * @return \SalesRules\Coupon
     */
    public function getCoupon()
    {
        return $this->_coupon;
    }
}
