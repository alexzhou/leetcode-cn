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
     * @return Integer[][]
     */
    function levelOrder($root) {
        if($root===null)return [];
        $result = [];
        $level = 0;
        $this->traverse($root,$result,$level);
        return array_values($result);
    }
    /**
     * @param TreeNode $node
     */
    function traverse($node,&$result,$level){
        $result[$level][] = $node->val;
        if($node->left || $node->right){
            $level++;
        }else{
            return ;
        }
        if($node->left){
            $this->traverse($node->left,$result,$level);
        }
        if($node->right){
            $this->traverse($node->right,$result,$level);
        }
    }
}