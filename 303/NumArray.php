<?php
class NumArray {
    /**
     * @param Integer[] $nums
     */

    protected  $dp = [];
    function __construct($nums) {
        $sum = [];
        $sum[0] = $nums[0];
        for($i=1;$i<count($nums);$i++){
            $sum[$i] = $sum[$i-1] + $nums[$i];
        }
        $this->dp = $sum;
    }

    /**
     * @param Integer $i
     * @param Integer $j
     * @return Integer
     */
    function sumRange($i, $j) {
        if($i==0){
            return $this->dp[$j];
        }
        return $this->dp[$j] - $this->dp[$i-1];
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = NumArray($nums);
 * $ret_1 = $obj->sumRange($i, $j);
 */

$obj = new NumArray([-2,0,3,-5,2,-1]);
$ret_1 = $obj->sumRange(2, 5);
echo $ret_1;