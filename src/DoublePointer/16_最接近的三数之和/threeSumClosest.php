<?php
class Solution {

    /**
     * 三数之和改编的暴力解法
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);

        $len = count($nums);
        for ($first=0;$first<$len;$first++){
            // 需要和上一次枚举的数不相同
            if ($first > 0 && $nums[$first] == $nums[$first - 1]) {
                continue;
            }
            for ($second=$first+1;$second<$len;$second++){
                $third = $len-1;
                // 需要和上一次枚举的数不相同
                if ($second >  $first + 1 && $nums[$second] == $nums[$second - 1]) {
                    continue;
                }
                while ($second < $third ){
                    $sum = $nums[$first]+$nums[$second]+$nums[$third];
                    //echo $sum.'='.$nums[$first].'+'.$nums[$second].'+'.$nums[$third].PHP_EOL;
                    $v = abs($sum-$target);
                    if(!isset($tempMin))$tempMin=$sum;
                    if($v<abs($tempMin-$target)){
                        $tempMin = $sum;
                    }
                    $third--;
                }
                if(!isset($min)) $min = $tempMin;
                if(abs($tempMin-$target) < abs($min-$target)){
                    $min = $tempMin;
                }
                //循环到底
                if ($second == $third) {
                    continue;
                }
            }
        }
        return $min;
    }

    function threeSumClosestV2($nums, $target) {
        sort($nums);
        $len = count($nums);

        for ($i=0;$i<$len;$i++){
            // 需要和上一次枚举的数不相同
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            // 使用双指针枚举 b 和 c  双指针相向移动 优化速度
            $j = $i + 1;$k = $len - 1;
            while ($j < $k) {
                $sum = $nums[$i] + $nums[$j] + $nums[$k];
                // 如果和为 target 直接返回答案
                if ($sum == $target) {
                    return $target;
                }
                $v = abs($sum-$target);
                if(!isset($min))$min=$sum;
                if($v<abs($min-$target)){
                    $min = $sum;
                }
                if ($sum > $target) {
                    // 如果和大于 target，移动 c 对应的指针
                    $k0 = $k - 1;
                    // 移动到下一个不相等的元素
                    while ($j < $k0 && $nums[$k0] == $nums[$k]) {
                        --$k0;
                    }
                    $k = $k0;
                } else {
                    // 如果和小于 target，移动 b 对应的指针
                    $j0 = $j + 1;
                    // 移动到下一个不相等的元素
                    while ($j0 < $k && $nums[$j0] == $nums[$j]) {
                        ++$j0;
                    }
                    $j = $j0;
                }
            }
        }
        return $min;
    }
}
$obj = new Solution();
print_r($obj->threeSumClosestV2([1,1,1,0],-100));