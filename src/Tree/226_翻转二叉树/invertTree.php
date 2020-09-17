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
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if($root!==null){
            $node = $this->invertTree($root->left);
            $root->left = $this->invertTree($root->right);
            $root->right = $node;
        }
        return $root;
    }
}