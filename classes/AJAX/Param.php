<?php

/**
 * Description of Param
 *
 * @author micah
 */
class AJAX_Param
{

    static protected $pool = array();

    public function __construct()
    {
        
    }
    static public function fromKey($key, $defaultValue = null)
    {
        if (array_key_exists($key, self::$pool)) {
            return new AJAX_Param();
        }
        throw new Exception;
    }

    static public function setPool(array $pool)
    {
        self::$pool = $pool;
    }

    static public function getPool()
    {
        return self::$pool;
    }

    static public function must()
    {
        
    }

}
