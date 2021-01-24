<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $len  = count($nums);
        if($len==0)return [];
        $pre = $nums[0];
        $ans = [];
        $pair = [$pre,$pre];
        for($i=1;$i<$len;$i++){
            $curr = $nums[$i];
            if($pre+1 == $curr){
                $pair[1] = $curr;
            }else{
                $ans[] = $pair[0]==$pair[1]? strval($pair[0]):strval($pair[0]).'->'.strval($pair[1]);
                $pair = [$curr,$curr];
            }
            $pre = $curr;
        }
        $ans[] = $pair[0]==$pair[1]? strval($pair[0]):strval($pair[0]).'->'.strval($pair[1]);
        return $ans;
    }
}