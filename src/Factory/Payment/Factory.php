<?php
namespace Payment;

use \Payment\Exception\UnknownAdapter;

class Factory
{
    /**
     * creates a instance of payment adapter.
     * 
     * @param string $adapterType
     * @return \Payment\Adapter\AdapterInterface
     */
    public static function createInstance($adapterType)
    {
        $adapterClass = sprintf('\\Payment\Adapter\\' . $adapterType);
        if( ! class_exists($adapterClass) ) {
            throw new UnknownAdapter('Unknown adapter:' . $adapterType);
        }
        return new $adapterClass(self::_getConfig($adapterType));
    }
    
    /**
     * returns payment configuration data.
     * 
     * @param string $adapterType
     * @retun array
     */
    private static function _getConfig($adapterType)
    {   
        $config = include 'Config/payment.php';
        return $config[$adapterType];
    }
}
