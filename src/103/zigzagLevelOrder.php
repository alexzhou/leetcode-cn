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
    function zigzagLevelOrder($root) {
        //TODO not complete
        if($root===null)return [];
        $result = [];
        $level = 0;
        $left = 1;
        $this->traverse($root,$result,$level,$left);
        return array_values($result);
    }
    /**
     * @param TreeNode $node
     */
    function traverse($node,&$result,$level,$left){
        $result[$level][] = $node->val;
        if($node->left || $node->right){
            $level++;
        }else{
            return ;
        }
        if($left){
            if($node->right){
                $this->traverse($node->right,$result,$level,0);
            }
            if($node->left){
                $this->traverse($node->left,$result,$level,0);
            }
        }else{
            if($node->left){
                $this->traverse($node->left,$result,$level,1);
            }
            if($node->right){
                $this->traverse($node->right,$result,$level,1);
            }
        }

    }
}