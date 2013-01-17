<?php

class MineField {

    public function __construct($N, $M){
        $this->numberOfRows = $N;
        $this->numberOfCols = $M;
        $this->mineFieldInput = array_fill(0,($this->numberOfRows*$this->numberOfCols),'.');
        $this->mineFieldOutput = array_fill(0,($this->numberOfRows*$this->numberOfCols),0);
    }

    public function createMineField($mines){
        $this->mines = $mines;

        foreach ($mines as $row => $col) {
            $this->mineFieldInput[( (($row-1)*$this->numberOfRows) + $col)-1] = '*';
        }

        return $this->mineFieldInput;
    }


    public function displayMineFieldOutput(){
        foreach ($this->mines as $row => $col) {
                    $this->getSurroundRow($row,$col);
        }
        return $this->mineFieldOutput;
    }


    public function getSurroundRow($r, $c){
        //Previous Row (Check if r-1 exists)
        ($r-1>0)?$this->getSurroundCol($r-1,$c):'';

        //Current Row
        $this->getSurroundCol($r,$c,true);

        //Next Row (Check if r+1 exists)
        ($r+1<=$this->numberOfRows)?$this->getSurroundCol($r+1,$c):'';
    }


    public function getSurroundCol($r, $c, $same_row = false){
        //Previous Column
        if($c-1>0){
            $this->mineFieldOutput[( (($r-1)*$this->numberOfRows) + $c-1)-1]++;
        }

        //Current Column
        if(!$same_row){
            $this->mineFieldOutput[( (($r-1)*$this->numberOfRows) + $c)-1]++;
        }else{
            $this->mineFieldOutput[( (($r-1)*$this->numberOfRows) + $c)-1] = '*';
        }

        //Next Column
        if($c+1<=$this->numberOfCols){
            $this->mineFieldOutput[( (($r-1)*$this->numberOfRows) + $c+1)-1]++;
        }

    }

}