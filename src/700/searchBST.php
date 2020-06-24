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
use common\TreeNode;
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val) {
        if(is_null($root))return null;
        if($val > $root->val){
            return $this->searchBST($root->right,$val);
        }elseif($val < $root->val){
            return $this->searchBST($root->left,$val);
        }else{
            return $root;
        }
    }
}