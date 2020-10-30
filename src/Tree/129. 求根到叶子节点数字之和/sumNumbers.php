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
     * @return Integer
     */
    public $sum=0;
    function sumNumbers($root) {
        $this->travel($root,[]);
        return  $this->sum;
    }

    function travel($node,$path){
        if($node->left===null && $node->right===null){
            $path[] = $node->val;
            $len = count($path);
            $j=$len-1;
            for($i=0;$i<$len;$i++){
                $val= $path[$i]*pow(10,$j);
                $this->sum+=$val;
                $j--;
            }
        }else{
            $path[] = $node->val;
            if($node->left !== null){
                $this->travel($node->left,$path);
            }
            if($node->right !== null){
                $this->travel($node->right,$path);
            }
        }
    }
}