<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLengthOfLCIS($nums) {
        $l = $r = $max = 0;
        $len = count($nums);
        if($len<=1)return $len;
        $pre = $nums[0];
        for ($i=1;$i<$len;$i++){
            $curr = $nums[$i];
            if($pre < $curr){
                $r = $i;
            }else{
                $max = max($r-$l+1,$max);
                $l = $r = $i;
            }
            $pre = $curr;
        }
        $max = max($r-$l+1,$max);//处理最后一位
        return $max;
    }
}

$obj = new Solution();
$len = $obj->findLengthOfLCIS([1,3,5,4,7]);
echo $len.PHP_EOL;