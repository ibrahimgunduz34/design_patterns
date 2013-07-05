<?php
namespace Payment;

class Request
{
    /**
     * @var string
     */
    private $_orderId;
    
    /**
     * @var string
     */
    private $_cardNumber;

    /**
     * @var string
     */
    private $_securityCode;

    /*
     * @var integer
     */
    private $_expireMonth;
    
    /**
     * @var integer
     */
    private $_expireYear;

    /**
     * @var float
     */
    private $_amount;

    /**
     * sets order_id to request.
     *
     * @param string $orderId
     * @return \Payment\Request
     */
    public function setOrderId($orderId)
    {
        $this->_orderId = $orderId;
        return $this;
    }
    
    /**
     * sets card number to request.
     *
     * @param string $cardNumber
     * @return \Payment\Request
     */

    public function setCardNumber($cardNumber)
    {
        $this->_cardNumber = $cardNumber;
        return $this;
    }
    
    /**
     * sets security code to request.
     *
     * @param string  $securityCode
     * @return \Payment\Request
     */
    public function setSecurityCode($securityCode)
    {
        $this->_securityCode = $securityCode;
        return $this;
    }
    
    /**
     * sets month part of card expire date to request.
     *
     * @param integer $expireMonth
     * @return \Payment\Request
     */
    public function setExpireMonth($expireMonth)
    {
        $this->_expireMonth = $expireMonth;
        return $this;
    }

    /**
     * sets year part of card expire date to request.
     *
     * @param integer $expireYear
     * @return \Payment\Request
     */
    public function setExpireYear($expireYear)
    {
        $this->_expireYear = $expireYear;
        return $this;
    }
    
    /**
     * sets order amount to request.
     *
     * @param float $securityCode
     * @return \Payment\Request
     */
    public function setAmount($amount)
    {
        $this->_amount = $amount;
        return $this;
    }
    
    /**
     * returns order_id from request.
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->_orderId;
    }
    
    /**
     * returns card number from request.
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->_cardNumber;
    }
    
    /**
     * returns security code from request.
     *
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->_securityCode;
    }
    
    /**
     * returns month part of card expire date from request.
     *
     * @return integer
     */
    public function getExpireMonth()
    {
        return $this->_expireMonth;
    }
    
    /**
     * returns  year part of card expire date from request.
     *
     * @return integer
     */
    public function getExpireYear()
    {
        return $this->_expireYear;
    }
    
    /**
     * returns order amount from request.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->_amount;
    }
}
