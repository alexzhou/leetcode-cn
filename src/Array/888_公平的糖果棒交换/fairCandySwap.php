<?php
class Solution {

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer[]
     */
    function fairCandySwap($A, $B) {
        $sumA = array_sum($A);
        $sumB = array_sum($B);
        $delta = ($sumA - $sumB) / 2;
        $map = [];
        foreach ($A as $x){
            $map[$x] = $x;
        }
       foreach ($B as $y){
           $x = $y+$delta;
           if(isset($map[$x])){
               return [$x,$y];
           }
       }
       return [];
    }
}