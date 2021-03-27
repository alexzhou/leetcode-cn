<?php
//以数组 intervals 表示若干个区间的集合，其中单个区间为 intervals[i] = [starti, endi] 。请你合并所有重叠的区间，并返
//回一个不重叠的区间数组，该数组需恰好覆盖输入中的所有区间。 
//
// 
//
// 示例 1： 
//
// 
//输入：intervals = [[1,3],[2,6],[8,10],[15,18]]
//输出：[[1,6],[8,10],[15,18]]
//解释：区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
// 
//
// 示例 2： 
//
// 
//输入：intervals = [[1,4],[4,5]]
//输出：[[1,5]]
//解释：区间 [1,4] 和 [4,5] 可被视为重叠区间。 
//
// 
//
// 提示： 
//
// 
// 1 <= intervals.length <= 104 
// intervals[i].length == 2 
// 0 <= starti <= endi <= 104 
// 
// Related Topics 排序 数组 
// 👍 836 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        usort($intervals,function ($i,$j){
            return $i[0] > $j[0];
        });

        echo json_encode($intervals).PHP_EOL;
        $n = count($intervals);
        $ans = [];
        $temp = $intervals[0];
        for($i=1;$i<$n;$i++){
            if($intervals[$i][0] <= $temp[1]){
                $temp = [min($temp[0],$intervals[$i][0]),max($intervals[$i][1],$temp[1])];
            }else{
                $ans[] = $temp;
                $temp = $intervals[$i];
            }
            //print_r($temp);
        }
        if(!empty($temp)){
            $ans[] = $temp;
        }
        return $ans;
    }
}

$obj = new Solution();
print_r($obj->merge([[1,4],[0,2],[3,5]]));
//leetcode submit region end(Prohibit modification and deletion)
