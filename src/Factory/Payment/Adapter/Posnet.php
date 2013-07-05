<?php
namespace Payment\Adapter;

use \DOMDocument;
use \SimpleXMLElement;

use \Array2XML;

use \Payment\Request;
use \Payment\Response;
use \Payment\Adapter\AdapterInterface;
use \Payment\Adapter\AdapterAbstract;
use \Payment\Exception\UnexpectedProviderResponse;

class Posnet extends AdapterAbstract implements AdapterInterface
{
    /**
     * build common request data.
     * 
     * @return array
     */
    private function _buildBaseRequest()
    {
        $config = $this->_config;
        return array(
            'mid'      => $config['mid'],
            'tid'      => $config['tid'] ,
            'username' => $config['api_username'],
            'password' => $config['api_password'],
        );
    }

    /**
     * Generates an xml for payment transaction with the 
     * specified data.
     *
     * @param array $data
     * @return string
     */
    private function _buildRequest(array $data)
    {
        $data = array_merge($data, $this->_buildBaseRequest());
        $xml = Array2XML::createXML('posnetRequest', $data)->saveXml();
        return http_build_query(array('xmldata' => $xml ));
    }

    /**
     * Generates an xml string for sale transaction.
     *
     * @param \Payment\Request $request
     * @return string
     */
    protected function _buildSaleRequest(Request $request)
    {
        $requestData = array(
            'sale' => array(
                'ccno' => $request->getCardNumber(),
                'cvc' => $request->getSecurityCode(),
                'expDate' => $this->_formatExpireDate(
                    $request->getExpireMonth(), 
                    $request->getExpireYear()
                ),
                'orderID' => $request->getOrderId(),
                'amount' => $this->_formatAmount($request->getAmount()),
                'currencyCode'  => 'YT',
            ),
        );
        return $this->_buildRequest($requestData);
    }

    /**
     * parses provider response.
     * 
     * @param string $rawResponse
     * @return \Payment\Response
     */
    protected function _parseResponse($rawResponse)
    {
        $response = new Response();
        try {
            $xml = new SimpleXMLElement($rawResponse);
            $response->setIsSuccess( (int) $xml->approved == 1 );
            $response->setCode( 
                property_exists($xml, 'respCode') ?  
                    $xml->respCode : ''
            );
            if( ! $response->isSuccess() ) {
                if( property_exists($xml, 'respText') ) {
                    $errorMessage = (string) $xml->respText;
                    $response->setMessage( $errorMessage );
                }
            }
        } catch(Exception $e) {
            throw new UnexpectedProviderResponse(
                'Provider is sent an unexpected ' .
                'response.Response: ' . $rawResponse
            );
        }
        return $response;
    }
    
    /**
     * formats amount as expected by the provider.
     *
     * @param float $amount
     * @return string
     */
    protected function _formatAmount($amount)
    {
        return number_format($amount, 2, '', '');
    }
    
    /**
     * formats expire date as expected by the provider.
     *
     * @param integer $month
     * @param integer $year
     * @return string
     */
    protected function _formatExpireDate($month, $year)
    {
        return sprintf('%02s%02s', substr($year, 2, 2), $month);
    }
}

