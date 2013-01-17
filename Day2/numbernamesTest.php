<?php

require 'numbernames.php';

class NumberNamesTest extends PHPUnit_Framework_TestCase {

    public function testSpellNumber(){
        $number = new NumberNames();
        $result = $number->spellNumber(9137045);
        $this->assertEquals($result, 'nine million, one hundred and thirty seven thousand and forty five');
    }

}