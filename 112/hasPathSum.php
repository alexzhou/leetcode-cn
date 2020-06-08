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
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum) {
        $result = [];
        $this->path($root,[],$result);
        foreach ($result as $items){
            if( array_sum($items)==$sum)return true;
        }
        return false;
    }

    /**
     * @param TreeNode $node
     * @param array $path
     * @param array $result
     * @return array
     */
    function path($node,$path,&$result){
        if($node===null)return $path;
        $path[] = $node->val;
        if ($node->left){
            $this->path($node->left, $path, $result);
        }
        if ($node->right){
            $this->path($node->right, $path, $result);
        }
        if ($node->left===null && $node->right===null){
            $result[] = $path;
        }
    }
}