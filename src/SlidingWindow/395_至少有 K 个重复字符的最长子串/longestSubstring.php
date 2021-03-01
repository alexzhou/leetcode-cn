<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function longestSubstring($s, $k) {
        $left = $right = 0;
        $n = strlen($s);

        for($i=0;$i<$n;$i++){
            $map[$s[$i]]++;
        }
    }
}