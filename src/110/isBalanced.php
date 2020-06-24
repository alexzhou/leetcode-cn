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

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        if ($root == null) return true;

        $lh = $this->height($root->left);
        $rh = $this->height($root->right);

        if (abs($lh - $rh) <= 1 && $this->isBalanced($root->left) && $this->isBalanced($root->right)){
            return true;
        }
        return false;
    }

    function height($node){
        if ($node === null) return 0;
        return 1 + max($this->height($node->left), $this->height($node->right));
    }

}
