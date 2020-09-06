<?php

class Automaton{
    const MAX = 2147483647;
    const MIN = -2147483648;
    public $state = 'start';
    public $sign = 1;
    public $ans = 0;
    public $table = [
        'start'=>['start', 'signed', 'in_number', 'end'],
        'signed'=> ['end', 'end', 'in_number', 'end'],
        'in_number'=> ['end', 'end', 'in_number', 'end'],
        'end'=> ['end', 'end', 'end', 'end'],
    ];
    public function get_col($c)
    {
        if($c==' '){
            return 0;
        }else if($c == '+' || $c=='-'){
            return 1;
        }else if(is_numeric($c)){
            return 2;
        }else{
            return 3;
        }
    }

    public function get($c){
        $this->state = $this->table[$this->state][$this->get_col($c)];
        if($this->state=='in_number'){
            $this->ans = $this->ans*10+intval($c);
            if($this->sign==1){
                $this->ans = min($this->ans,self::MAX);
            }else{
                $this->ans = min($this->ans,-self::MIN);
            }
        }else if($this->state=='signed'){
            $this->sign= $c=='+'?1:-1;
        }
    }
}

class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $automaton = new Automaton();
        $len = strlen($str);
        for ($i=0;$i<$len;$i++){
            $automaton->get($str[$i]);
        }
        return $automaton->sign*$automaton->ans;
    }
}