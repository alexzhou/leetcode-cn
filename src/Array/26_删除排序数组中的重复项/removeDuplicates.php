<?php
class Solution {

    /**
     * 一开始没看题 题目要求用O(1)的存储空间原地修改数组，之前用的$map 虽然测试过了 但是不符合题目要求的
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        if (count($nums) == 0) return 0;
        $i = 0;
        $len = count($nums);
        for ($j = 1; $j < $len; $j++) {
            if ($nums[$j] != $nums[$i]) {
                $i++;
                $nums[$i] = $nums[$j];
            }
        }
        return $i + 1;
    }
}