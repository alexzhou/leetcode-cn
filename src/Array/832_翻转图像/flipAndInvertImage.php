<?php
class Solution {

    /**
     * @param Integer[][] $A
     * @return Integer[][]
     */
    function flipAndInvertImage($A) {
        $n = count($A[0]);
        foreach ($A as &$row){
            $left = 0;
            $right = $n-1;
            while($left <= $right){
                $temp = $row[$right];
                $row[$right] = $row[$left] ^ 1;
                $row[$left] = !$temp  ^ 1;
                $left++;
                $right--;
            }
        }
        unset($row);
        return $A;
    }
}