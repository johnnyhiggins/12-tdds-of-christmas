<?php

require 'MineField.php';

class MineFieldTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->N = 5;
        $this->M = 5;
        $this->mineField = new MineField($this->N, $this->M);

        $this->mines = array(
            '1' => '3',
            '3' => '2',
            '4' => '4'
        );

        $this->expectedInput = array(   '.','.','*','.','.',
                                        '.','.','.','.','.',
                                        '.','*','.','.','.',
                                        '.','.','.','*','.',
                                        '.','.','.','.','.'
        );

        $this->expectedOutput = array(  0,  1, '*', 1, 0,
                                        1,  2,  2,  1, 0,
                                        1, '*', 2,  1, 1,
                                        1,  1,  2, '*',1,
                                        0,  0,  1,  1, 1,
        );
    }

    public function testMineFieldInput(){
        $result = $this->mineField->createMineField($this->mines);
        $this->assertEquals($this->expectedInput, $result);
    }

    public function testMineFieldOutput(){
        $this->mineField->createMineField($this->mines);
        $result = $this->mineField->displayMineFieldOutput();
        $this->assertEquals($this->expectedOutput, $result);
    }
}
