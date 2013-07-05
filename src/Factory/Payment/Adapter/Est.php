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

class Est extends AdapterAbstract implements AdapterInterface
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
            'Name'      => $config['api_username'],
            'Password'  => $config['api_password'],
            'ClientId'  => $config['client_id'],
            'Mode'      => $config['mode'],
            'Currency'  => '949' //949 is TRL currency code
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
        $xml = Array2XML::createXML('CC5Request', $data)->saveXml();
        return http_build_query(array('DATA' => $xml ));
    }

    /**
     * @see \Payment\Adapter\AdapterAbstract::_buildSaleRequest()
     */
    protected function _buildSaleRequest(Request $request)
    {
        $requestData = array(
            'Type'     => 'Auth',
            'Total'    => $this->_formatAmount($request->getAmount()),
            'Number'   => $request->getCardNumber(),
            'Cvv2Val'  => $request->getSecurityCode(),
            'Expires'  => $this->_formatExpireDate(
                $request->getExpireMonth(), 
                $request->getExpireYear()
            ),
            'OrderId'  => $request->getOrderId(),
        );
        return $this->_buildRequest($requestData);
    }
    
    /**
     * @see \Payment\Adapter\AdapterAbstract::_parseResponse()
     */
    protected function _parseResponse($rawResponse)
    {
        $response = new Response();
        try {
            $xml = new SimpleXMLElement($rawResponse);
            $response->setIsSuccess( (string) $xml->Response == 'Approved' );
            $response->setCode( (string) $xml->ProcReturnCode );
            if( ! $response->isSuccess() ) {
                $errorMessages = array();
                if( property_exists($xml, 'Error') ) {
                    $errorMessages[] = sprintf(
                        'Error: %s', 
                        (string) $xml->Error
                    );
                }

                if(property_exists($xml, 'ErrMsg')) {
                    $errorMessages[] = sprintf(
                        'Error Message: %s ',
                        (string) $xml->ErrMsg
                    );
                }

                if(property_exists($xml, 'Extra') 
                    && property_exists($xml->Extra, 'HOSTMSG')
                ) {
                    $errorMessages[] = sprintf(
                        'Host Message: %s',
                        (string) $xml->Extra->HOSTMSG
                    );
                }
                $errorMessage = implode(' ', $errorMessages);
                $response->setMessage( $errorMessage );
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
     * @see \Payment\Adapter\AdapterAbstract::_formatAmount()
     */
    protected function _formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }
    
    /**
     * @see \Payment\Adapter\AdapterAbstract::_formatAmount()
     */
    protected function _formatExpireDate($month, $year)
    {
        return sprintf('%02s/20%02s', $month, $year);
    }
}
                                                     
