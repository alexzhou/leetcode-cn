<?php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxValue($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $dp[0][0] = $grid[0][0];

        for ($l=0;$l<$cols;$l++){
            for ($t=0;$t<$rows;$t++){
                if($l==0&&$t==0){
                    $dp[$l][$t] = $grid[$l][$t];
                }
                if($l==0){
                    $dp[$l][$t] = $dp[$l-1][$t]+$grid[$l][$t];
                }
                if($t==0){
                    $dp[$l][$t] = $dp[$l][$t-1]+$grid[$l][$t];
                }
                if($l>0 && $t>0){
                    $dp[$l][$t] = max($dp[$l][$t-1],$dp[$l-1][$t])+$grid[$l][$t];
                }
            }
        }

        return $dp[$rows-1][$cols-1];
    }
}

$grid  =[
    [1,3,1],
    [1,5,1],
    [4,2,1]
];
$obj = new Solution();
echo $obj->maxValue($grid);