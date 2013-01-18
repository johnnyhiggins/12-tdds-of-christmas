<?php

require 'MontyHall.php';

class MontyHallTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->game = new MontyHall();
        $this->prizes = $this->game->setCarAsPrize();
    }

    public function testSetCarAsPrize(){
        $this->assertSameSize(array(1,2,3),$this->prizes);
    }

    public function testPlayerInitiallySelects(){
        $num = rand(1,3); // Randomly chooses Door 1, 2 or 3
        $firstSelection= $this->game->playerInitiallySelects($num);
        $this->assertEquals($this->prizes[$num],$firstSelection[$num]);
    }

    public function testRemoveOneGoatFromNonSelected(){
        $num = rand(1,3); // Randomly chooses Door 1, 2 or 3
        $firstSelection = $this->game->playerInitiallySelects($num);
        $remainingItem = $this->game->removeOneGoatFromNonSelected();
        $this->assertSameSize(array(1),$remainingItem);
    }

    public function testStickOrTwist(){
        $stickingSuccess = 0;
        $twistingSuccess = 0;
        $count = 10000;
        for($i=0;$i<$count;$i++){
            $num = rand(1,3); // Randomly chooses Door 1, 2 or 3
            $firstSelection = $this->game->playerInitiallySelects($num);
            $remainingItem = $this->game->removeOneGoatFromNonSelected();
            $sticking = $this->game->stickOrTwist(1); //Stick
            $twisting = $this->game->stickOrTwist(0); //Stick

            $stickingSuccess +=  ($sticking[$num]=='Car')?1:0;
            $twistingSuccess +=  ($twisting[key($remainingItem)]=='Car')?1:0;

            //print_r($this->prizes);
            //print_r($firstSelection);
            //print_r($remainingItem);
            //print_r($sticking);
            //print_r(array('Sticking:' => $stickingSuccess));

            $this->prizes = $this->game->refreshGamePrizes();
            //print_r(array('New Prizes', $this->prizes));


            $this->assertEquals($firstSelection,$sticking);
            $this->assertEquals($remainingItem,$twisting);
        }
        print_r(array('Sticking Success:' => ($stickingSuccess/$count*100).'%'));
        print_r(array('Twisting Success:' => ($twistingSuccess/$count*100).'%'));
    }

}
