<?php
//给你一个整数数组 nums 和两个整数 k 和 t 。请你判断是否存在 两个不同下标 i 和 j，使得 abs(nums[i] - nums[j]) <= 
//t ，同时又满足 abs(i - j) <= k 。 
//
// 如果存在则返回 true，不存在返回 false。 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [1,2,3,1], k = 3, t = 0
//输出：true 
//
// 示例 2： 
//
// 
//输入：nums = [1,0,1,1], k = 1, t = 2
//输出：true 
//
// 示例 3： 
//
// 
//输入：nums = [1,5,9,1,5,9], k = 2, t = 3
//输出：false 
//
// 
//
// 提示： 
//
// 
// 0 <= nums.length <= 2 * 104 
// -231 <= nums[i] <= 231 - 1 
// 0 <= k <= 104 
// 0 <= t <= 231 - 1 
// 
// Related Topics 排序 Ordered Map 
// 👍 337 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $t
     * @return Boolean
     */
    function containsNearbyAlmostDuplicate($nums, $k, $t) {
        $list = [];
        $n = count($nums);
        if($n==0)return false;
        foreach($nums as $index=> $num){
            $list[] = [$index,$num];
        }
        usort($list,function($a,$b){
            if($a[1] >= $b[1]){
                return 1;
            }
            return -1;
        });
        for($i=0;$i<$n;$i++){
            $pre = $list[$i];
            for($j=$i+1;$j<$n;$j++){
                $curr = $list[$j];
                $t_c = abs($curr[1] - $pre[1]);
                if($t_c > $t){
                    break;
                }
                if( $t_c <= $t && abs($curr[0]-$pre[0]) <= $k){
                    return true;
                }
            }
        }
        return false;

    }
}
//leetcode submit region end(Prohibit modification and deletion)
