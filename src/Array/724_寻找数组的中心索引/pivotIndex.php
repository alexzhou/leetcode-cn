<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums) {
        $len = count($nums);
        if($len<1)return -1;
        $leftSum = [];
        $leftSum[0] = 0; //every index left sum value
        for ($i=1;$i<$len;$i++){
            $leftSum[$i] = $leftSum[$i-1]+$nums[$i-1];
        }
        $total = $leftSum[$len-1]+$nums[$len-1];
        $rightSum = [];
        for ($i=0;$i<$len;$i++){
            $rightSum[$i] = $total - $nums[$i] - $leftSum[$i];
            if($leftSum[$i]==$rightSum[$i]){
                return $i;
            }
        }
        return -1;
    }
}

$obj = new Solution();
$pivot = $obj->pivotIndex([1, 2, 3]);
echo $pivot.PHP_EOL;