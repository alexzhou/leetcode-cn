<?php
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums){
        if(empty($nums))return null;
        $pos = count($nums)/2;
        $node = new TreeNode($nums[$pos]);
        $node->left = $this->sortedArrayToBST(array_slice($nums,0,$pos));
        $node->right = $this->sortedArrayToBST(array_slice($nums,$pos+1));
        return $node;
    }
}