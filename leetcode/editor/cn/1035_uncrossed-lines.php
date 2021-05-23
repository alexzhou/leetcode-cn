<?php
//在两条独立的水平线上按给定的顺序写下 nums1 和 nums2 中的整数。 
//
// 现在，可以绘制一些连接两个数字 nums1[i] 和 nums2[j] 的直线，这些直线需要同时满足满足： 
//
// 
// nums1[i] == nums2[j] 
// 且绘制的直线不与任何其他连线（非水平线）相交。 
// 
//
// 请注意，连线即使在端点也不能相交：每个数字只能属于一条连线。 
//
// 以这种方法绘制线条，并返回可以绘制的最大连线数。 
//
// 
//
// 示例 1： 
//
//
// 
//输入：nums1 = [1,4,2], nums2 = [1,2,4]
//输出：2
//解释：可以画出两条不交叉的线，如上图所示。 
//但无法画出第三条不相交的直线，因为从 nums1[1]=4 到 nums2[2]=4 的直线将与从 nums1[2]=2 到 nums2[1]=2 的直线相
//交。
// 
//
// 
// 示例 2： 
//
// 
//输入：nums1 = [2,5,1,2,5], nums2 = [10,5,2,1,5,2]
//输出：3
// 
//
// 
// 示例 3： 
//
// 
//输入：nums1 = [1,3,7,1,7,5], nums2 = [1,9,2,5,1]
//输出：2 
//
// 
// 
// 
//
// 提示： 
//
// 
// 1 <= nums1.length <= 500 
// 1 <= nums2.length <= 500 
// 1 <= nums1[i], nums2[i] <= 2000 
// 
//
// 
// Related Topics 数组 
// 👍 196 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxUncrossedLines($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);
        //init
        $dp = [];
        for($i=0;$i<=$m;$i++){
            $dp[$i] = array_fill(0,$n+1,0);
        }
        //dp
        for($i=1;$i<=$m;$i++){
            $a = $nums1[$i-1];
            for($j=1;$j<=$n;$j++){
                $b = $nums2[$j-1];
                if($a==$b){
                    $dp[$i][$j] = $dp[$i-1][$j-1] +1;
                }else{
                    $dp[$i][$j] = max($dp[$i-1][$j],$dp[$i][$j-1]);
                }
            }
        }
        //echo json_encode($dp);
        return $dp[$m][$n];
    }
}
//leetcode submit region end(Prohibit modification and deletion)
