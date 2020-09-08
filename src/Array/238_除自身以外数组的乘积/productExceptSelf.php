<?php
class Solution {

    /**
     * 时间复杂度O(3N) ->O(N)
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {

        $len = count($nums);
        $left = [];
        $val = 1;
        for ($i=0;$i<$len;$i++){
            $val*=$nums[$i];
            $left[$i] = $val;
        }
        $right=[];
        $val = 1;
        for ($j=$len-1;$j>=0;$j--){
            $val *= $nums[$j];
            $right[$j] = $val;
        }

        for($k=0;$k<$len;$k++){
            if($k==0){
                $result[] = $right[$k+1];
            }else  if($k==$len-1){
                $result[] = $left[$k-1];
            }else{
                $result[] = $left[$k-1]*$right[$k+1];
            }
        }
        return $result;
    }
}

$obj = new Solution();
print_r($obj->productExceptSelf([1,2,3,4]));