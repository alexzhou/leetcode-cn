<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function checkPossibility($nums) {
        $len = count($nums);
        $count = 0;
        for($i=0;$i<$len-1;$i++){
            $x = $nums[$i];
            $y = $nums[$i+1];
            if($x>$y){
                $count++;
                if($count>1){
                    return false;
                }
                if($i>0&& $y<$nums[$i-1]){
                    $nums[$i+1]= $x;
                }
            }
        }
        return true;
    }
}
$obj = new Solution();
$ans =  $obj->checkPossibility([5,7,1,8]);
var_dump($ans);

