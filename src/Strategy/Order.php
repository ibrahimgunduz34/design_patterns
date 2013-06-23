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
    private $_tax;

    /**
     * @var float
     */
    private $_discountAmount;

    /**
     * @var float
     */
    private $_grandTotal;
    
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
     * sets identity of order.
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
     * @param float $netTotal
     * @return Order
     */
    public function setNetTotal($netTotal)
    {
        $this->_netTotal = $netTotal;
        return $this;
    }

    /**
     * sets tax amount.
     * @param float $tax
     * @return Order
     */
    public function setTax($tax)
    {
        $this->_tax = $tax;
        return $this;
    }

    /**
     * sets discount amount
     * @param float $discountAmount
     * @return Order
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->_discountAmount = $discountAmount;
        return $this;
    }
    
    /**
     * sets grand total.
     * @param float $grandTotal
     * @return Order
     */
    public function setGrandTotal($grandTotal)
    {
        $this->_grandTotal = $grandTotal;
        return $this;
    }

    /**
     * returns identity of order.
     * @return integer
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * returns net total
     * @return float
     */
    public function getNetTotal()
    {
        return $this->_netTotal;
    }

    /**
     * returns tax amount.
     * @return float
     */
    public function getTax()
    {
        return $this->_tax;
    }
    
    /**
     * returns discount amount.
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->_discountAmount;
    }
    
    /**
     * returns coupon code.
     * @return string
     */
    public function getGrandTotal()
    {
        return $this->_grandTotal;
    }
}
