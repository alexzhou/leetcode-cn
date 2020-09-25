<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        /**
         * dp[i] = dp[i-1]+$nums[i] //dp[i-1]>=0
         * dp[i] = $nums[i] //dp[i-1] < 0
         */
        $dp[0] = $nums[0];
        $max = $dp[0];
        $len = count($nums);
        for ($i=1;$i<$len;$i++){
            $dp[$i] = $dp[$i-1]>=0?$dp[$i-1]+$nums[$i]:$nums[$i];
            $max = max($dp[$i],$max);
        }
        return $max;
    }
}