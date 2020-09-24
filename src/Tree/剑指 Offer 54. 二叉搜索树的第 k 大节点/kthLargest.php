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
     * @param Integer $k
     * @return Integer
     */
    function kthLargest($root, $k) {
        $arr = [];
        $this->inorder($root,$arr);
        return $arr[$k-1];
    }

    function inorder($node,&$arr){
        if($node==null)return;
        $this->inorder($node->right,$arr);
        $arr[] = $node->val;
        $this->inorder($node->left,$arr);
    }
}