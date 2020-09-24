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
     * @return Integer[]
     */
    function levelOrder($root) {
        $queue = [];
        array_push($queue,$root);
        $result = [];
        while (!empty($queue)){
            $size = count($queue);
            for($i=1;$i<=$size;$i++){
                $item = array_shift($queue);
                $result[] = $item->val;
                if($item->left)array_push($queue,$item->left);
                if($item->right)array_push($queue,$item->right);
            }
        }
        return $result;
    }
}