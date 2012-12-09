<?php
require '../../../../../../../php/pear/PHPUnit/Autoload.php';
require '../../../../classes/AJAX/Param.php';
require '../../../../classes/AJAX/Param/Required.php';
require '../../../../classes/AJAX/Param/Optional.php';

class AJAX_ParamTest extends PHPUnit_Framework_TestCase
{
    public function testGetSetPool()
    {
        $ary = array('tacos'=>'yummy');
        $this->assertEquals(array(), AJAX_Param::getPool());
        AJAX_Param::setPool($ary);
        $this->assertEquals($ary, AJAX_Param::getPool());
    }
    public function testRequiresExists()
    {
        AJAX_Param::setPool(array('key'=>'value'));
        $param = AJAX_Param::requires('key');
        $this->assertInstanceOf('AJAX_Param', $param);
        $this->assertEquals('value', (string)$param);
    }
    public function testRequiresNotExists()
    {
        AJAX_Param::setPool(array());
        try {
            AJAX_Param::requires('key');
        } catch (Exception $exc) {
            return true;
        }
        $this->fail('An error should have been thrown');
    }
    
    public function testDefaultToHasValue()
    {
        $pool = array('key'=>'value');
        AJAX_Param::setPool($pool);
        $param = AJAX_Param::defaults('key')->to('37');
        $this->assertInstanceOf('AJAX_Param', $param);
        $this->assertEquals('value', (string)$param);
    }
    public function testDefaultNoValue()
    {
        $pool = array('key'=>'');
        AJAX_Param::setPool($pool);
        $param = AJAX_Param::defaults('key')->to('37');
        $this->assertInstanceOf('AJAX_Param', $param);
        $this->assertEquals('37', (string)$param);        
    }
    public function testDefaultNoKey()
    {
        $pool = array();
        AJAX_Param::setPool($pool);
        $param = AJAX_Param::defaults('key')->to('37');
        $this->assertInstanceOf('AJAX_Param', $param);
        $this->assertEquals('37', (string)$param);        
    }
}