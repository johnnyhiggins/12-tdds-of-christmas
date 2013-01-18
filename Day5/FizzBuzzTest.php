<?php

require 'FizzBuzz.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->start = 1;
        $this->end = 100;
        $this->fizzBuzz = new FizzBuzz($this->start, $this->end);

        $this->num_to_test = 15;

        for($i=$this->start;$i<=$this->end;$i++){
            $this->expected[$i] = $i;
        }
    }

    public function testNumbersToOneHundred(){
        $numbers_array = $this->fizzBuzz->numbersFromStartToEnd();
        $this->assertEquals($this->expected,$numbers_array);
    }

    public function testIfFizz(){
        $isFizz = $this->fizzBuzz->ifFizz($this->num_to_test);
        $this->assertTrue($isFizz);
    }

    public function testIfBuzz(){
        $isBuzz = $this->fizzBuzz->ifBuzz($this->num_to_test);
        $this->assertTrue($isBuzz);
    }

    public function testIfFizzBuzz(){
        $isFizzBuzz = $this->fizzBuzz->ifFizzBuzz($this->num_to_test);
        $this->assertTrue($isFizzBuzz);
    }

    public function testFizzBuzzText(){
        $text = $this->fizzBuzz->fizzBuzzText();
        $this->assertEquals('FizzBuzz',$text[75]);
        $this->assertEquals('Fizz',$text[87]);
        $this->assertEquals('Buzz',$text[25]);
        $this->assertEquals('FizzBuzz',$text[75]);
        print_r($text);
    }


}
