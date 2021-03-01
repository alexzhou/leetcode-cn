<?php
class NumArray {
    private $map = [];
    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $n  = count($nums);
        $sum = 0;
        for ($i=0;$i<$n;$i++){
            $sum += $nums[$i];
            $this->map[$i] = $sum;
        }
    }

    /**
     * @param Integer $i
     * @param Integer $j
     * @return Integer
     */
    function sumRange($i, $j) {
        $left = $i==0?0:$this->map[$i-1];
        return $this->map[$j] - $left;
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = NumArray($nums);
 * $ret_1 = $obj->sumRange($i, $j);
 */