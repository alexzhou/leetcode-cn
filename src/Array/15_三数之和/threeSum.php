<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $len = count($nums);
        $result = [];
        for ($first=0;$first<$len;$first++){
            // 需要和上一次枚举的数不相同
            if ($first > 0 && $nums[$first] == $nums[$first - 1]) {
                continue;
            }
            $third = $len-1;
            for ($second=$first+1;$second<$len;$second++){
                // 需要和上一次枚举的数不相同
                if ($second >  $first + 1 && $nums[$second] == $nums[$second - 1]) {
                    continue;
                }
                while ($second < $third && $nums[$first]+$nums[$second]+$nums[$third] > 0){
                    $third--;
                }
                //循环到底
                if ($second == $third) {
                    break;
                }
                //判断sum是否等于0
                if($nums[$first]+$nums[$second]+$nums[$third]==0){
                    $result[] = [$nums[$first],$nums[$second],$nums[$third]];
                }
            }
        }
        return $result;
        /**
         * towSum  threeSum差别很大，threeSum 改进的暴力搜索
         */
    }
}
$obj = new Solution();
print_r($obj->threeSum([-1,0,1,2,-1,-4]));