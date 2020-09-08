<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $map = [];
        foreach ($nums as $num){
            if(isset($map[$num])){
                return  true;
            }else{
                $map[$num] = 1;
            }
        }
        return false;
    }
}

$obj = new Solution();
var_dump($obj->containsDuplicate([1,2,3,1]));