<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $len = count($nums);
        if($nums[$len-1] < $target)return  $len;
        if($nums[0] >= $target)return  0;
        for ($i=$len-1;$i>=0;$i--){
            if($nums[$i]<$target){
                return $i+1;
            }
        }
    }


    //PHP 内置方法
    function searchInsert2($nums, $target) {
        array_push($nums,$target);
        sort($nums);
        return array_search($target,$nums);
    }

    //二分查找
    function searchInsert3($nums, $target) {
        $right = count($nums)-1;
        $left = 0;
        while($left<=$right){
            $mid = floor(($left+$right)/2);
            if($nums[$mid]==$target){
                return $mid;
            }elseif ($nums[$mid] < $target){
                $left = $mid+1;
            }else {
                $right = $mid-1;
            }
        }
        return $target <= $nums[$mid] ? $mid : $mid + 1;
    }

}

/**
 * [1,3,5,6]
 * 2
 */
$nums = [1,3,5,6];$target = 7;
$obj = new Solution();
echo $obj->searchInsert3($nums,$target).PHP_EOL;