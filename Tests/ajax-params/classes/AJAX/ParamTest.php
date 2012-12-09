<?php
require '../../../../../../../php/pear/PHPUnit/Autoload.php';
require '../../../../classes/AJAX/Param.php';

class AJAX_ParamTest extends PHPUnit_Framework_TestCase
{
    public function testGetSetPool()
    {
        $ary = array('tacos'=>'yummy');
        $this->assertEquals(array(), AJAX_Param::getPool());
        AJAX_Param::setPool($ary);
        $this->assertEquals($ary, AJAX_Param::getPool());
    }
    public function testFromKeyRequiredExists()
    {
        AJAX_Param::setPool(array('index' => 'value'));
        $this->assertInstanceOf('AJAX_Param', AJAX_Param::fromKey('index'));
    }
    public function testFromKeyRequiredDoesntExist()
    {
        try {
            AJAX_Param::fromKey('key');
        } catch (Exception $exc) {
            return false;
        }
        $this->fail('Should have thrown an error');
    }
    public function testMustBeAIsValid()
    {
        
    //    $param = AJAX_Param::fromKey('index')->mustBe('an', 'int');
     //   $param2 = AJAX_Param::must('be a', stdClass);
    }
    public function testMustBeAIsNotValid()
    {

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