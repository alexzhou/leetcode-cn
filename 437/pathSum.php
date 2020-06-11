<?php
use common\TreeNode;
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum) {
        //TODO 未完成 不正确
        $result = [];
        $this->path($root,[],$result);
        $count = 0;
        foreach ($result as $items){
            if( array_sum($items)==$sum)$count++;
        }
        return $count;
    }

    function path($node,$path,&$result){
        if($node===null){
            return $path;
        }
        $path[] = $node->val;
        $result[] = $path;
        if ($node->left){
            $this->path($node->left, $path, $result);
        }
        if ($node->right){
            $this->path($node->right, $path, $result);
        }
        if ($node->left===null && $node->right===null){
            return $path;
        }
    }
}