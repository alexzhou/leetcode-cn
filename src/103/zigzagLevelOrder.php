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
        $level = 1;
        $this->traverse($root,$result,$level);
        return array_values($result);
    }
    /**
     * DFS 深度遍历的操作
     * @param TreeNode $node
     */
    function traverse($node,&$result,$level){
        if(!isset($result[$level])){
            $result[$level] = [];
        }
        if($level%2){
            array_push($result[$level],$node->val);
        }else{
            array_unshift($result[$level],$node->val);
        }
        if($node->left==null && $node->right==null){
            return ;
        }
        if($node->left){
            $this->traverse($node->left,$result,$level+1);
        }
        if($node->right){
            $this->traverse($node->right,$result,$level+1);
        }

    }
}