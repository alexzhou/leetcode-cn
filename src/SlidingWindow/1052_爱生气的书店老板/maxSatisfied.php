<?php
class Solution {
    /**
     * @param Integer[] $customers
     * @param Integer[] $grumpy
     * @param Integer $X
     * @return Integer
     */
    function maxSatisfied($customers, $grumpy, $X) {
        $n = count($grumpy);
        $left = $sum = $ans =0;
        $maxPair = [];
        $maxValue = -1;
        for($i=0;$i<$n;$i++){
            //不生气时候顾客数累加
            if($grumpy[$i]==0){
                $ans+=$customers[$i];
            }
            //求X分钟内生气损失顾客数最大值及其区间
            if($grumpy[$i]==1){
                $sum += $customers[$i];
            }
            if($i-$left+1 > $X ){
                if($grumpy[$left]==1){
                    $sum-=$customers[$left];
                }
                if($sum > $maxValue){
                    $maxValue = $sum;
                    $maxPair = [$left+1,$i];
                }
                $left++;
            }else{
                if($sum > $maxValue){
                    $maxValue = $sum;
                    $maxPair = [$left,$i];
                }
            }
        }
        //补加损失的最大区间
        for($i=$maxPair[0];$i<=$maxPair[1];$i++){
            if($grumpy[$i]==1){
                $ans+=$customers[$i];
            }
        }
        return $ans;
    }
}
$obj = new Solution();
echo $obj->maxSatisfied([1,0,1,2,1,1,7,5],
[0,1,0,1,0,1,0,1],
3);