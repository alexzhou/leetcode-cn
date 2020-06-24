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
    function maxDepth($root) {
        if ($root === null) return 0;
        return 1 + max($this->maxDepth($root->left), $this->maxDepth($root->right));
    }
}