<?php

class MontyHall {

    public function __construct(){
        $this->prizes = array_fill(1,3,'Goat');
    }

    public function setCarAsPrize(){
        $this->prizes[rand(1,3)] = 'Car';
        return $this->prizes;
    }

    public function playerInitiallySelects($door){
        if(in_array($door,array(1,2,3))){
            $this->initialSelection = array($door => $this->prizes[$door]);
            unset($this->prizes[$door]);
            return $this->initialSelection;
        }
        return;
    }

    public function removeOneGoatFromNonSelected(){
        $goat = array_search('Goat', $this->prizes);
        unset($this->prizes[$goat]);
        return $this->prizes;
    }

    public function stickOrTwist($stick){
        return ($stick)? $this->initialSelection : $this->prizes;
    }

    public function refreshGamePrizes(){
        $this->prizes = array();
        $this->prizes = array_fill(1,3,'Goat');
        $this->prizes[rand(1,3)] = 'Car';
        return $this->prizes;
    }

}