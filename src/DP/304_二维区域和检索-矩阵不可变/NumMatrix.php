<?php
class NumMatrix {
    private $dp = [];
    /**
     * @param Integer[][] $matrix
     */
    function __construct($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $dp = [];
        $dp[-1][-1] = 0;
        $dp[0][0] = $matrix[0][0];
        for ($a=0;$a<$m;$a++){
            $dp[-1][$a] = 0;
        }
        for ($b=0;$b<$n;$b++){
            $dp[$b][-1] = 0;
        }
        for($i=0;$i<$m;$i++){
            for ($j=0;$j<$n;$j++){
                $dp[$i][$j] = $dp[$i][$j-1] + $dp[$i-1][$j]  - $dp[$i-1][$j-1]  + $matrix[$i][$j];
            }
        }
        $this->dp = $dp;
        //print_r($dp);
    }

    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @return Integer
     */
    function sumRegion($row1, $col1, $row2, $col2) {
        return $this->dp[$row2][$col2] - $this->dp[$row1-1][$col2] - $this->dp[$row2][$col1-1] + $this->dp[$row1-1][$col1-1];
    }
}
$matrix = [
    [3, 0, 1, 4, 2],
    [5, 6, 3, 2, 1],
    [1, 2, 0, 1, 5],
    [4, 1, 0, 1, 7],
    [1, 0, 3, 0, 5]
];
$obj =new NumMatrix($matrix);

/**
 * Your NumMatrix object will be instantiated and called as such:
 * $obj = NumMatrix($matrix);
 * $ret_1 = $obj->sumRegion($row1, $col1, $row2, $col2);
 */