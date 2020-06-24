<?php
class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost) {

        $len = count($cost);

        if($len < 2) return 0;


        $a[0] = 0;      //$a 不经过该元素
        $b[0] = $cost[0]; // $b 跨过一步踩到该元素
        $c[0] = $cost[0]; //$c 跨2步踩到该元素

        $a[1] = $cost[0];
        $b[1] = $cost[0]+$cost[1];
        $c[1] = $cost[1];

        for ($i=2;$i<$len;$i++){
            $a[$i] = min($b[$i-1],$c[$i-1]);
            $b[$i] = min($b[$i-1],$c[$i-1]) + $cost[$i];
            $c[$i] = min($b[$i-2],$c[$i-2]) + $cost[$i];
        }

        return min($a[$len-1],$b[$len-1],$c[$len-1]);

    }
}

$obj = new Solution();
echo $obj->minCostClimbingStairs([10,15,20]);
echo $obj->minCostClimbingStairs([1, 100, 1, 1, 1, 100, 1, 1, 100, 1]);