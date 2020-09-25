<?php
class Solution{

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

    function fib2($N) {
        if($N<=1) return $N;
        $a = 0;
        $b = 1;
        $c = 0;
        for ($i = 0; $i < $N-1; $i++) {
            $c = $a+$b;
            $a=$b;
            $b=$c;
        }
        return $c;
    }
}
$obj = new Solution();
echo $obj->fib(96);