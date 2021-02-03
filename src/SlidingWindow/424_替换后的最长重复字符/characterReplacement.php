<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function characterReplacement($s, $k) {

        $left = $right = $max = 0;
        $n = strlen($s);
        $count = [];
        while ($right < $n){
            $char = $s[$right];
            isset($count[$char])?($count[$char]++):($count[$char] = 1);
            $max = max($count[$char],$max);
            if( $right-$left+1 > $k+$max){
                $count[$s[$left]]--;
                $left++;
            }
            $right++;
        }
        return ($right-1)-$left+1;
    }
}

$str = "AABABBA";
$k=1;
$obj = new Solution();
echo $obj->characterReplacement($str,$k).PHP_EOL;