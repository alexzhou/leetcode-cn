<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $len = count($nums);
        $left = 0;
        $right = $len-1;
        while ($left<=$right){
            $mid = floor(($right+$left)/2);
            if($nums[$mid]==$target)return  $mid;
            if($nums[0] <= $nums[$mid]){
                if( $nums[0] <= $target && $target < $nums[$mid] ){
                    $right  = $mid-1;
                }else{
                    $left = $mid+1;
                }
            }else{
                if( $nums[$mid] < $target && $target <= $nums[$len-1] ){
                    $left  = $mid+1;
                }else{
                    $right = $mid-1;
                }
            }
        }
        return -1;
    }
}
$obj = new Solution();
$result = $obj->search([4,5,6,7,0,1,2],0);
echo '============'.PHP_EOL;
echo $result;
echo '============'.PHP_EOL;