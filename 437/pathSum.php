<?php
use common\TreeNode;
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum) {
        $result = [];
        $this->path($root,[],$result);
        $count = 0;
        foreach ($result as $items){
            //TODO 判断每个有序数组的子数组和
        }
        return $count;
    }

    function path($node,$path,&$result){
        if($node===null){
            return $path;
        }
        $path[] = $node->val;
        if ($node->left){
            $this->path($node->left, $path, $result);
        }
        if ($node->right){
            $this->path($node->right, $path, $result);
        }
        if ($node->left===null && $node->right===null){
            $result[] = $path;
        }
    }
}