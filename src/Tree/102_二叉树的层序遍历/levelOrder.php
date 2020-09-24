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

    function levelOrder2($root) {
        return $this->traverse2($root);
    }
    /**
     * DFS
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

    /**
     * BFS
     * @param TreeNode $node
     * @param $result
     */
    function traverse2($node){
        if($node==null)return [];
        $queue = [];
        array_push($queue,$node);
        $result = [];
        while (!empty($queue)){
            $size = count($queue);
            $row = [];
            for($i=1;$i<=$size;$i++){
                $item = array_shift($queue);
                $row[] = $item->val;
                if($item->left)array_push($queue,$item->left);
                if($item->right)array_push($queue,$item->right);
            }
            $result[] = $row;
        }
    }
}