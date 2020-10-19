<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n) {
        $dp[0] =1;
        $a = $b = $c = 0;
        for ($i=1;$i<$n;$i++){
            $n2 = $dp[$a]*2;
            $n3 = $dp[$b]*3;
            $n5 = $dp[$c]*5;

            $dp[$i] = min($n2,$n3,$n5);
            if($dp[$i]==$n2){
                $a++;
            }
            if($dp[$i]==$n3){
                $b++;
            }
            if($dp[$i]==$n5){
                $c++;
            }
        }
        return $dp[$n-1];
    }
}
$obj = new Solution();
echo $obj->nthUglyNumber(10);