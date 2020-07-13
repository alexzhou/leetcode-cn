<?php
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root) {
        $result = [];
        if($root===null)return $result;
        $queue = [];
        array_push($queue,$root);
        while (!empty($queue)){
            $size = count($queue);
            $result[] = [];
            for($i=1;$i<=$size;$i++){
                $item = array_shift($queue);
                $result[count($result)-1][] = $item->val;
                if($item->left)array_push($queue,$item->left);
                if($item->right)array_push($queue,$item->right);
            }
        }
        krsort($result);
        return $result;
    }
}