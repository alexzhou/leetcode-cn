<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];
        foreach ($nums as $key=>$num){
            $v = $target - $num;
            if(isset($map[$v]))return [$map[$v],$key];
            $map[$num] = $key;
        }
        //全部把map set好 反而不好判断了 比如重复的数字
        //循环到当前数字做判断比较好做
        return [];
    }
}
$obj = new Solution();
print_r($obj->twoSum([3,2,4],6));