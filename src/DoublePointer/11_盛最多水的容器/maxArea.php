<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        if(count($height) < 2)return 0;
        $len = count($height);
        $max = 0;
        $l=0;$r = $len-1;
        while ($l<$r){
            $v = ($r-$l)*min($height[$l],$height[$r]);
            if($height[$l] < $height[$r]){
                $l++;
            }else{
                $r--;
            }
            $max = max($max,$v);
        }
        return $max;
    }
}

/**
 * 算法讲解
 * https://leetcode-cn.com/problems/container-with-most-water/solution/sheng-zui-duo-shui-de-rong-qi-by-leetcode-solution/
 */
$obj = new Solution();
echo $obj->maxArea([1,8,6,2,5,4,8,3,7]);