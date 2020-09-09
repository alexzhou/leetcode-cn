<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
use common\TreeNode;
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumOfLeftLeaves($root) {
        $sum = 0;
        $this->sum($root,$sum);
        return $sum;
    }

    /**
     * @param TreeNode $node
     * @return Integer
     */
    function sum($node,&$val) {
        if($node===null)return $val;
        if($node->left){
            if($node->left->left==null && $node->left->right==null){
                $val += $node->left->val;
            }else{
                $this->sum($node->left,$val);
            }
        }
        if($node->right){
            $this->sum($node->right,$val);
        }
    }
}