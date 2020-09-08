<?php
class Solution {

    /**
     * 注意题目要求
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $l=0;
        $r = count($s)-1;
        while($l<$r){
            $temp = $s[$l];
            $s[$l] = $s[$r];
            $s[$r] = $temp;
            $l++;
            $r--;
        }
    }
}