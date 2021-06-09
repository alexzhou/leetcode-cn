<?php
//给你一个整数数组 nums ，返回 nums[i] XOR nums[j] 的最大运算结果，其中 0 ≤ i ≤ j < n 。 
//
// 进阶：你可以在 O(n) 的时间解决这个问题吗？ 
//
// 
//
// 
// 
// 示例 1： 
//
// 
//输入：nums = [3,10,5,25,2,8]
//输出：28
//解释：最大运算结果是 5 XOR 25 = 28. 
//
// 示例 2： 
//
// 
//输入：nums = [0]
//输出：0
// 
//
// 示例 3： 
//
// 
//输入：nums = [2,4]
//输出：6
// 
//
// 示例 4： 
//
// 
//输入：nums = [8,10,2]
//输出：10
// 
//
// 示例 5： 
//
// 
//输入：nums = [14,70,53,83,49,91,36,80,92,51,66,70]
//输出：127
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 2 * 104 
// 0 <= nums[i] <= 231 - 1 
// 
// 
// 
// Related Topics 位运算 字典树 
// 👍 359 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Trie{
    public $left = null;
    public $right  =null;
}
class Solution {
    public $trie;
    function add($num){
        $high = 30;
        $cur = $this->trie;
        for($k=$high;$k>=0;$k--){
            $v = ($num>>$k)&1;
            if($v==1){
                if(!$cur->right){
                    $cur->right = new Trie();
                }
                $cur = $cur->right;
            }else{
                if(!$cur->left){
                    $cur->left = new Trie();
                }
                $cur = $cur->left;
            }
        }
    }

    function find($num){
        $high = 30;
        $cur = $this->trie;
        $x = 0;
        for($k=$high;$k>=0;$k--){
            $v = ($num>>$k)&1;
            if($v==1){
                if($cur->left){
                    $cur = $cur->left;
                    $x = $x*2+1;
                }else{
                    $cur = $cur->right;
                    $x = $x*2;
                }
            }else{
                if($cur->right){
                    $x = $x*2+1;
                    $cur = $cur->right;
                }else{
                    $cur = $cur->left;
                    $x = $x*2;
                }
            }
        }
        return $x;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaximumXOR($nums) {
        $this->trie = new Trie();
        $x = 0;
        foreach ($nums as $num){
            $this->add($num);
            //print_r($this->trie);
            $x = max($x,$this->find($num));
        }
        return $x;
    }
}

//$s = new Solution();
//echo $s->findMaximumXOR([3,10,5,25,2,8]).PHP_EOL;

//leetcode submit region end(Prohibit modification and deletion)
