<?php
class Autoloader
{
    public static function autoload($class)
    {
        require(  strtr($class, '_\\', '//') . '.php');
    }

    public static function init()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}
