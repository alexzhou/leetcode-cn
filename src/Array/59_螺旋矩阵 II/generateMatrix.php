<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
        $v = $n*$n;

        $left = 0;$right= $n-1;
        $top = 0;$bottom = $n-1;
        $i=1;
        $matrix = [];
        while ($i<=$v && $left<=$right && $top<=$bottom){
            for ($j=$left;$j<=$right;$j++){
                $matrix[$top][$j] = $i;
                $i++;
            }
            for ($j=$top+1;$j<=$bottom;$j++){
                $matrix[$j][$right] = $i;
                $i++;
            }
            if($left<$right && $top<$bottom){
                for ($j=$right-1;$j>=$left;$j--){
                    $matrix[$bottom][$j] = $i;
                    $i++;
                }
                for ($j=$bottom-1;$j>$top;$j--){
                    $matrix[$j][$left] = $i;
                    $i++;
                }
            }
            $left++;
            $right--;
            $bottom--;
            $top++;
        }
        foreach ($matrix as &$row){
            ksort($row);
        }
        return $matrix;
    }
}

$obj = new Solution();
$result = $obj->generateMatrix(3);
var_dump($result);