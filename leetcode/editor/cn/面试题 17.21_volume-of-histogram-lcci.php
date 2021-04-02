<?php
//给定一个直方图(也称柱状图)，假设有人从上面源源不断地倒水，最后直方图能存多少水量?直方图的宽度为 1。 
//
// 
//
// 上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的直方图，在这种情况下，可以接 6 个单位的水（蓝色部分表示水）。 感谢 Marco
//s 贡献此图。 
//
// 示例: 
//
// 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
//输出: 6 
// Related Topics 栈 数组 双指针 
// 👍 94 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $n = count($height);
        $l_max =$sum[0]= $height[0];
        $l_p = 0;
        $left = 0;
        for ($i=1;$i<$n;$i++){
            $sum[$i] = $sum[$i-1]+$height[$i];
            if($height[$i]>=$l_max){
                $w  = $i-1-$l_p;
                $h = $l_max;
                $left += $w*$h;
                $left -= ($sum[$i] - $sum[$l_p]-$height[$i]);

                $l_p = $i;
                $l_max  =$height[$i];
            }
        }

        $r_max = $height[$n-1];
        $r_p = $n-1;
        $right = 0;
        for ($i=$n-2;$i>=0&&$i>=$l_p;$i--){
            if($height[$i]>=$r_max){
                $w  = $r_p-1-$i;
                $h = $r_max;

                $right += $w*$h;
                $right -= ($sum[$r_p] - $sum[$i] -$height[$r_p]);

                $r_p = $i;
                $r_max  =$height[$i];
            }
        }

        return $left+$right;
    }
}

$s = new Solution();
echo $s->trap([4,2,3]);
//leetcode submit region end(Prohibit modification and deletion)
