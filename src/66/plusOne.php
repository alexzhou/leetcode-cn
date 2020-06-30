<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $len = count($digits);
        for ($i=$len-1;$i>=0;$i--){
            if($digits[$i]+1 >= 10){
                $digits[$i] =  ($digits[$i]+1)%10;
                if($i==0){
                    array_unshift($digits,1);
                    break;
                }
            }else{
                $digits[$i]+=1;
                break;
            }
        }
        return $digits;
    }
}
$digits = [9,9];
$obj = new Solution();
print_r($obj->plusOne($digits));