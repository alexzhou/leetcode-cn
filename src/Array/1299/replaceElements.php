<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function replaceElements($arr) {
        $right = count($arr) - 1;
        $max = $arr[$right];
        $arr[$right] = -1;
        for ($i = $right-1;$i>=0;$i--){
            $temp = $arr[$i];
            $arr[$i] = $max;
            $max = $temp>$max?$temp:$max;
        }
        return $arr;
    }
}

$arr = [17,18,5,4,6,1];
$obj = new Solution();
$arr = $obj->replaceElements($arr);
print_r($arr); //[18,6,6,6,1,-1]