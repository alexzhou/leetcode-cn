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
        $sumArray = [0=>1];
        foreach ($result as $items){
            //TODO 多个循环之间会有重复的路径 计数错误的增多
            $count += $this->subarraySum($items,$sum,$sumArray);
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

    /**
     * [10,5,-3,3,2,null,11,3,-2,null,1] ==> 所有完整路径[[10,5,3,3],[10,5,3,-2],[10,5,2,1],[10,-3,11]]
     * 对每个路径连续子序列求和看是否等于$k
     * @param $nums
     * @param $k
     * @return int|mixed
     */
    function subarraySum($nums, $k)
    {
        $hashmap = [0=>1];
        $acc = 0;
        $count = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $acc += $nums[$i];
            if ($acc === $k) $count++;
            if (isset($hashmap[$acc - $k]) && $hashmap[$acc - $k] !== 0) {
                $count += $hashmap[$acc - $k];
            }
            if ($hashmap[$acc] === 0) {
                $hashmap[$acc] = 1;
            } else {
                $hashmap[$acc] += 1;
            }
        }
        return $count;
    }
}