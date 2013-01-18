<?php

class FizzBuzz
{

    public function __construct($start, $end){
        // Create an array with 100 items:
        $this->numbers_array = array_fill($start,$end,0);
    }

    public function numbersFromStartToEnd(){
        // Fill the array with numbers 1 to 100
        foreach ($this->numbers_array as $ind => $val) {
            $this->numbers_array[$ind] = $ind;
        }
        return $this->numbers_array;
    }

    public function ifFizz($num){
        return ($num%3==0)?true:false;
    }

    public function ifBuzz($num){
        return ($num%5==0)?true:false;
    }

    public function ifFizzBuzz($num){
        return ($this->ifFizz($num)&&$this->ifBuzz($num))?true:false;
    }

    public function fizzBuzzText(){
        $numbers_array = $this->numbersFromStartToEnd();
        foreach ($numbers_array as $num) {
            $isOneOrTheOther = false;
            if($this->ifFizz($num)){
                $text[$num] = 'Fizz';
                $isOneOrTheOther = true;
            }
            if($this->ifBuzz($num)){
                $text[$num] = ($isOneOrTheOther)?$text[$num].'Buzz':'Buzz';
                $isOneOrTheOther = true;
            }
            $text[$num] = ($isOneOrTheOther)?$text[$num]:$num;
        }
        return $text;
    }

}
