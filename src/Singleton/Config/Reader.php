<?php
namespace Config;

use \Config\Exception\InvalidArgumentError;

class Reader
{
    /**
     * @var \Config\Reader
     */
    private static $_instance;
    
    /**
     * @var array
     */
    private $_data;
    
    /**
     * returns instance of this object.
     *
     * @return \Config\Reader
     */
    public static function getInstance()
    {
        if(!self::$_instance) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function __construct()
    {
        $this->_data = parse_ini_file('config.ini', true);
    }

    /**
     * returns configuration data.
     * 
     * @param string $section
     * @param string $attribute
     * @return array
     */
    public function getData($section=null, $attribute=null) 
    {
        if($section==null) {
            return $this->_data;
        }

        if(!array_key_exists($section, $this->_data)) {
            throw new InvalidArgumentError('Invalid section argument.');
        }

        if($attribute==null) {
            return $this->_data[$section];
        }

        if(!array_key_exists($attribute, $this->_data[$section])) {
            throw new InvalidArgumentError('Invalid attribute argument.');
        }
        
        return $this->_data[$section][$attribute];
    }
}
