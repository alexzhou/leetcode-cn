<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {

        $rows = count($matrix);
        $cols = count($matrix[0]);

        $left = 0; $top = 0; $right=$cols-1;$bottom=$rows-1;

        $list = [];
        /**
         * 螺旋不能 不能左右两边遍历相同的个数比如
         * top  left->right-1
         * right  top->bottom-1
         * bottom  right->left-1
         * left   bottom->top+1
         */
        while($left<=$right && $top<=$bottom){
            //top  left->right
            for ($i=$left;$i<=$right;$i++){
                echo $i.'--'.$right.PHP_EOL;
                $list[] = $matrix[$top][$i];
            }
            //right  top+1->bottom
            for($i=$top+1;$i<=$bottom;$i++){
                $list[] = $matrix[$i][$right];
            }
            if($top<$bottom && $left<$right){
                //bottom  right+1->left
                for ($i=$right-1;$i>=$left;$i--){
                    $list[] = $matrix[$bottom][$i];
                }
                //left  bottom-1->top-1
                for ($i=$bottom-1;$i>$top;$i--){
                    $list[] = $matrix[$i][$left];
                }
            }
            $top++;
            $bottom--;
            $left++;
            $right--;
        }
        return $list;
    }
}
$matrix =[
    [3],
    [2],
];
$obj = new Solution();
$result = $obj->spiralOrder($matrix);
print_r($result);