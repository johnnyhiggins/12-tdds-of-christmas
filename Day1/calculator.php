<?php

class Calculator {

    public function returnMinValue($nums){
        return min($nums);
    }

    public function returnMaxValue($nums){
        return max($nums);
    }

    public function numberOfElements($nums){
        return count($nums);
    }

    public function averageValue($nums){
        return array_sum($nums)/count($nums);
    }

}