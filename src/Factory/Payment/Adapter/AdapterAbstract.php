<?php
namespace Payment\Adapter;

use \Payment\Request;
use \Payment\Exception\CommunicationError;

abstract class AdapterAbstract
{
    /**
     * @var array
     */
    protected $_config;

    /**
     * Generates an xml string for sale transaction.
     *
     * @param \Payment\Request $request
     * @return string
     */
    abstract protected function _buildSaleRequest(Request $request);

    /**
     * parses provider response.
     * 
     * @param string $rawResponse
     * @return \Payment\Response
     */
    abstract protected function _parseResponse($rawResponse);
    
    /**
     * formats amount as expected by the provider.
     *
     * @param float $amount
     * @return string
     */
    abstract protected function _formatAmount($amount);
    
    /**
     * formats expire date as expected by the provider.
     *
     * @param integer $month
     * @param integer $year
     * @return string
     */
    abstract protected function _formatExpireDate($month, $year);
    
    /**
     * sends http request to the sepcified host.
     * 
     * @param string $url
     * @param string $data
     * @return string
     * @throws \Payment\Exception\CommunicationError
     */
    protected function _sendHttpRequest($url, $data)
    {
        $ch = curl_init();

        echo $data . PHP_EOL . PHP_EOL;
        
        $options = array(
            CURLOPT_URL             => $url,
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_RETURNTRANSFER  => true,
        );

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        if($error) {
            throw new CommunicationError('Communication error occurred.' .
                                         ' Details:' . $error);
        }

        echo $response . PHP_EOL . PHP_EOL;
        return $response;
    }
    
    /**
     * @see \Payment\Adapter\AdapterInterface::makeSale()
     */
    public function makeSale(Request $request)
    {
        $config = $this->_config;
        $rawRequest = $this->_buildSaleRequest($request);
        $rawResponse = $this->_sendHttpRequest($config['api_url'], $rawRequest);
        return $this->_parseResponse($rawResponse);
    }
    
    /**
     * class constructor
     * 
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->_config = $config;  
    }
}
