<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $max = max($m,$n);
        for($i=0;$i<$max;$i++){
            for($j=0;$j<$max;$j++){
                if($j>=$i){
                    continue;
                }
                if(isset($matrix[$i][$j]) && isset($matrix[$j][$i])){
                    $temp = $matrix[$i][$j];
                    $matrix[$i][$j] = $matrix[$j][$i];
                    $matrix[$j][$i] = $temp;
                }elseif(!isset($matrix[$i][$j]) && isset($matrix[$j][$i])){
                    $matrix[$i][$j] = $matrix[$j][$i];
                    unset($matrix[$j][$i]);
                }elseif(isset($matrix[$i][$j]) && !isset($matrix[$j][$i])){
                    $matrix[$j][$i]  = $matrix[$i][$j];
                    unset($matrix[$i][$j]);
                }
            }
            if(count($matrix[$i])==0){
                unset($matrix[$i]);
            }
        }
        return $matrix;
    }
}