<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return NULL
     */
    function flatten($root) {
        $this->preOrder($root);
    }

    /**
     * @param TreeNode $node
     * @param $path
     */
    function preOrder(&$node){
        if($node->left === null && $node->right === null){
            return;
        }
        if($node->left!==null){
            $this->preOrder($node->left);
        }
        if($node->right!==null){
            $this->preOrder($node->right);
        }
        if($node->left !== null && $node->right!==null){
            $right = $node->left->right;
            //找到左节点的最后一个右节点
            if($right){
                while($right){
                    if($right->right){
                        $right = $right->right;
                    }else{
                        break;
                    }
                }
                $right->right = $node->right;
            }else{
                $node->left->right = $node->right;
            }
            //end
            $node->right = $node->left;
            $node->left = null;
        }else if($node->left !== null && $node->right===null) {
            $node->right = $node->left;
            $node->left = null;
        }

    }
}
