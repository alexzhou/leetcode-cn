<?php
class Solution {

    /**
     * @param Integer[] $chips
     * @return Integer
     */
    function minCostToMoveChips($chips) {
        $odd = 0;
        $even = 0;
        for ($i = 0; $i < count($chips); $i++) {
            if ($chips[$i] % 2 == 0) {
                $even++;
            } else {
                $odd++;
            }
        }
        return min($odd,$even);
    }
}
/*
 * 难点在读题： 下面的例子[2,2,2,3,3]是前三个元素（第1，2，3）都在位置2上 后面两个元素（第4，5）都在位置3上
 * 在位置2和3之间移动显然每步都需要消耗1，把少的一方往多的一方拖动更节省
 * 还有一种情况比如是[2,2,2,4,4]，这种情况位置2和位置4之间拖动显然消耗是0，所以整体消耗是0；
 * [2,2,2,4,4,6,6]这种消耗也是0，可见偶数之间可以随意移动消耗都是0，可以忽略他们之间的距离。奇数之间也是。
 * 到最后主要是考察偶数位有多少元素，奇数位有多少元素，奇偶数之间移动消耗1（移动少的一方）
 */
$chips = [2,2,2,3,3];
$obj = new Solution();
echo $obj->minCostToMoveChips($chips).PHP_EOL;