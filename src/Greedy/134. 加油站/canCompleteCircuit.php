<?php
class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        //暴力解法

        $len = count($gas);
        for ($i=0;$i<$len;$i++){
           if( $gas[$i] >= $cost[$i]){
               //可以出发的点
               $startPoints[] = $i;
           }
        }
        foreach ($startPoints as $p){
            $val = 0;
            $flag = 0;
            $i = $p;
            while ($i!=$p || $flag==0){
                $val += $gas[$i];
                $val -= $cost[$i];
                if($val <0 )break;
                $i++;
                $flag++;
                $i = $i%$len;
                if ($i==$p){return $i;}
            }
        }
        return -1;
    }

    //https://leetcode-cn.com/problems/gas-station/solution/shou-hua-tu-jie-liang-ge-guan-jian-jie-lun-de-jian/
    //优秀解法
    function foo($gas, $cost){
        $start = 0;
        $len = count($gas);
        $tGas = 0;
        $tCost = 0;
        $left = 0;
        for ($i=0;$i<$len;$i++){
            $tGas += $gas[$i];
            $tCost += $cost[$i];
            $left +=($gas[$i] - $cost[$i]);
            if( $left < 0){
                $left =0;
                $start = $i+1;
            }
        }
        if($tGas < $tCost){
            return -1;
        }
        return $start;
    }
}
$gas  = [2];
$cost = [2];
$obj = new Solution();
echo $obj->canCompleteCircuit($gas,$cost).PHP_EOL;