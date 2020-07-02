<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     * 牛顿迭代法
     */
    function mySqrt($x) {
        $g=$x;
        while(abs($g*$g-$x)>0.1) //小数位数越多精度越高 eg: 0.00001
        {
            $g=($g+$x/$g)/2;
        }
        return floor($g);
    }
}
$x = 8;
$obj  = new Solution();
echo $obj->mySqrt2($x);