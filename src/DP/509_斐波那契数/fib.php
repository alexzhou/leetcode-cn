<?php
class Solution {

    /**
     * @param Integer $N
     * @return Integer
     */
    function fib($N) {
        $dp[0] = 0;
        $dp[1]  =1;
        if($N<=1)return  $N;
        for($i=2;$i<=$N;$i++){
            $dp[$i] = bcmod(bcadd($dp[$i-1] , $dp[$i-2]),'1000000007');
        }
        return $dp[$N-1];
    }
}
$obj = new Solution();
echo $obj->fib(96);