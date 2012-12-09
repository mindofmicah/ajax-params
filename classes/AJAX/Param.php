<?php

/**
 * Description of Param
 *
 * @author micah
 */
class AJAX_Param
{
    protected $value;
    static protected $pool = array();

    public function __construct($value = null)
    {
        $this->value = $value;
    }
    public function setValue($value)
            {
        $this->value = $value;
            }
            public function getValue(){
                return $this->value;
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
    
    static public function defaults($key)
    {
        if (!empty(self::$pool[$key])) {
            return new AJAX_Param(self::$pool[$key]);
        }
        return new AJAX_Param;
    }
    public function to($value)
    {
        if (is_null($this->value)) {
            $this->value = $value;
        }
        return $this;
    }
    public function __toString()
    {
        return $this->value;
    }
}
