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
     * @return Boolean
     */
    function isSymmetric($root) {
        return $this->check($root,$root);
    }
    /**
     * @param TreeNode $left
     * @param TreeNode $right
     * @param Integer $count
     * @return Integer
     */
    function check($left,$right){
        if(is_null($left) && is_null($right)){
            return true;
        }else if(is_null($left) ^ is_null($right)){
            return false;
        }
        return $left->val == $right->val && $this->check($left->left, $right->right) && $this->check($left->right, $right->left);
    }

    function check2($left,$right){
       //TODO 迭代
    }
}