<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $new = [];
        for($i=0;$i<$m;$i++){
            for($j=0;$j<$n;$j++){
                $new[$j][$i] = $matrix[$i][$j];
            }
        }
        return $new;
    }
}