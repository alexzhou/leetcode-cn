<?php
class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        rsort($stones);
        while (count($stones)>1){
            $a = array_shift($stones);
            $b = array_shift($stones);
            if($a!=$b){
                $stones[] = abs($a-$b);
            }
            rsort($stones);
        }
        if(empty($stones)){
            return 0;
        }
        return $stones[0];
    }
}
$stones = [2,2];
$obj = new Solution();
echo PHP_EOL.$obj->lastStoneWeight($stones).PHP_EOL;