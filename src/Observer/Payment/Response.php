<?php
namespace Payment;

class Response
{
    /**
     * @var boolean
     */
    private $_isSuccess;

    /**
     * @var string
     */
    private $_code;

    /**
     * @var string
     */
    private $_message;
    
    /**
     * sets success status to response object.
     *
     * @param boolean $isSuccess;
     * @return \Payment\Response
     */
    public function setIsSuccess($isSuccess)
    {
        $this->_isSuccess = $isSuccess;
        return $this;
    }
    
    /**
     * sets code to response object.
     *
     * @param string $code
     * @return \Payment\Response
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * sets message to response object.
     *
     * @param string $message
     * @return \Payment\Response
     */
    public function setMessage($message)
    {
      $this->_message = $message;
      return $this;
    }
    
    /**
     * returns response state.
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->_isSuccess;
    }
    
    /**
     * returns response code.
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * returns response message 
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }
}
