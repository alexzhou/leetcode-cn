<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numWays($n) {
        // dp[n] = dp[n-1] + 2*dp[n-2]

        $dp[0] = 1;
        $dp[1] = 1;
        $dp[2] = 2;
        for($i=3;$i<=$n;$i++){
            $sum = bcadd($dp[$i-1] , $dp[$i-2]);
            $dp[$i] = bcmod($sum,'1000000007');
        }
        return $dp[$n];
    }
}
$obj = new Solution();
echo $obj->numWays(7);