<?php
use common\TreeNode;
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum) {
        if($root == null){
            return 0;
        }
        $result = $this->countPath($root,$sum);
        $a = $this->pathSum($root->left,$sum);
        $b = $this->pathSum($root->right,$sum);
        return $result+$a+$b;
    }

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function countPath($root,$sum){
        if($root == null){
            return 0;
        }
        $sum = $sum - $root->val;
        $result = $sum == 0 ? 1:0;
        return $result + $this->countPath($root->left,$sum) + $this->countPath($root->right,$sum);
    }
    
}