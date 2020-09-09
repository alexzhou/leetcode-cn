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
     * @return Integer
     */
    function minDepth($root) {
        if ($root === null) return 0;

        $lm = $this->minDepth($root->left);
        $rm = $this->minDepth($root->right);

        if($lm===0){
            return 1+ $rm;
        }
        if($rm===0){
            return 1+ $lm;
        }
        if($rm!==0 && $lm!==0){
            return 1 + min($rm, $lm);
        }
    }
}