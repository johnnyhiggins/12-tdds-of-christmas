<?php

require 'calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->cal = new Calculator();
        $this->numbers = array(6,8,4,6,67,2,9,34,45);
    }

    public function testReturnMinValue() {
        $result = $this->cal->returnMinValue($this->numbers);
        $this->assertEquals($result, 2);
    }

    public function testReturnMaxValue() {
        $result = $this->cal->returnMaxValue($this->numbers);
        $this->assertEquals($result, 67);
    }

    public function testNumberOfElements(){
        $result = $this->cal->numberOfElements($this->numbers);
        $this->assertEquals($result, 9);
    }

    public function testAverageValue(){
        $result = $this->cal->averageValue($this->numbers);
        $this->assertEquals($result, 20.11111111111);
    }

}