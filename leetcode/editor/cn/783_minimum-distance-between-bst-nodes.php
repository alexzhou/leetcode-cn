<?php
//给你一个二叉搜索树的根节点 root ，返回 树中任意两不同节点值之间的最小差值 。 
//
// 注意：本题与 530：https://leetcode-cn.com/problems/minimum-absolute-difference-in-bs
//t/ 相同 
//
// 
//
// 
// 
// 示例 1： 
//
// 
//输入：root = [4,2,6,1,3]
//输出：1
// 
//
// 示例 2： 
//
// 
//输入：root = [1,0,48,null,null,12,49]
//输出：1
// 
//
// 
//
// 提示： 
//
// 
// 树中节点数目在范围 [2, 100] 内 
// 0 <= Node.val <= 105 
// 
// 
// 
// Related Topics 树 深度优先搜索 递归 
// 👍 171 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
//class TreeNode {
//    public $val = null;
//    public $left = null;
//    public $right = null;
//    function __construct($val = 0, $left = null, $right = null) {
//        $this->val = $val;
//        $this->left = $left;
//        $this->right = $right;
//    }
//}

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */

    public  $vals=[];

    function minDiffInBST($root) {
        $this->dfs($root);
        $n = count($this->vals);
        //print_r($this->vals);
        $min = PHP_INT_MAX;
        $pre = $this->vals[0];
        for($i=1;$i<$n;$i++){
            $curr = $this->vals[$i];
            $val = $curr - $pre;
            if($val < $min){
                $min = $val;
            }
            $pre = $curr;
        }
        return $min;
    }


    function dfs($node){
        if(empty($node))return;
        if($node->left){
            $this->dfs($node->left);
        }
        $this->vals[] = $node->val;
        if($node->right){
            $this->dfs($node->right);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
