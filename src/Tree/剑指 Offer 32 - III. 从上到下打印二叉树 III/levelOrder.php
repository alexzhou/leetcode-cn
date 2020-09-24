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
        if($root==null)return [];
        $result = [];
        $queue = [$root];
        $row = 1;
        while(count($queue)>0){
            $currentSize = count($queue);
            $rowArr = [];
            for ($i=0;$i<$currentSize;$i++){
                $node = array_shift($queue);
                if($row%2==0){
                    array_unshift($rowArr,$node->val);
                }else{
                    array_push($rowArr,$node->val);
                }
                if($node->left)array_push($queue,$node->left);
                if($node->right)array_push($queue,$node->right);
            }
            $result[] = $rowArr;
            $row++;
        }
        return $result;
    }
}