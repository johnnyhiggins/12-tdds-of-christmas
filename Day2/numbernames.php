<?php

class NumberNames {

    public function __construct(){
        $this->teenNumbers = array('','one','two','three','four','five','six','seven','eight','nine',
            'ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen',
            'eighteen','nineteen');

        $this->decadeNumbers = array(
            2 => 'twenty',
            3 => 'thirty',
            4 => 'forty',
            5 => 'fifty',
            6 => 'sixty',
            7 => 'seventy',
            8 => 'eighty',
            9 => 'ninety',
        );

        $this->otherNumbers = array('hundred','thousand','million', 'billion');
        $this->numberOfDigits;
    }


    public function spellNumber($num){

        $this->numberOfDigits = strlen((string)$num);

        for ($j=1;$j<20;$j++){
             $digit[$j] = 0;
        }

        for($i=$this->numberOfDigits;$i>0;$i--){
            $digit[$i] = substr($num,-($i),1);
        }

        return $this->getNumberInTextFormat($digit);
    }


    public function getDecadeNumbers($digit2, $digit1){
        $num = (int)($digit2.$digit1);
        if($num < 20){
            return $this->teenNumbers[$num];
        }else{
            return $this->decadeNumbers[$digit2] . ($digit1!=0?' '.$this->teenNumbers[$digit1]:'');
        }
    }

    public function getHundredNumbers($digit3, $digit2, $digit1, $spacing = ''){
        $andSomething = (($digit3>0)?$spacing.$this->teenNumbers[$digit3] . ' ' . $this->otherNumbers[0]:'') . (($spacing==', ' || $digit3>0) && ($digit2>0||$digit1>0)?' and ':'');
        return $andSomething . $this->getDecadeNumbers($digit2,$digit1);
    }

    public function getThousandNumbers($digit6, $digit5, $digit4, $digit3, $digit2, $digit1){
        $andSomething = ($digit6>0 || $digit5>0 || $digit4>0)?$this->getHundredNumbers($digit6,$digit5,$digit4). ' ' . $this->otherNumbers[1]:'';
        return ($andSomething!='')?$andSomething . $this->getHundredNumbers($digit3,$digit2,$digit1,', '):$this->getHundredNumbers($digit3,$digit2,$digit1,'');
    }

    public function getNumberInTextFormat($digit){
        $andSomething = ($digit[12]>0 || $digit[11]>0 || $digit[10]>0 || $digit[9]>0 || $digit[8]>0 || $digit[7]>0)?
            $this->getThousandNumbers($digit[12], $digit[11], $digit[10], $digit[9], $digit[8], $digit[7]). ' ' . $this->otherNumbers[2].', ':'';
        return ($andSomething!='')?$andSomething . $this->getThousandNumbers($digit[6], $digit[5], $digit[4], $digit[3], $digit[2], $digit[1]): $this->getThousandNumbers($digit[6], $digit[5], $digit[4], $digit[3], $digit[2], $digit[1]);
    }

}