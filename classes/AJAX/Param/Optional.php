<?php
/**
 * Description of Optional
 *
 * @author micah
 */
class AJAX_Param_Optional extends AJAX_Param
{
    public function to($param1, $param2 = null)
    {
        {
        if (is_null($this->value)) {
            $this->value = $param1;
        }
        return $this;
    }
    }
}