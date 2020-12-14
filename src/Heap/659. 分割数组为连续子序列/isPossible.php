<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isPossible($nums) {
        if (count($nums)<3){
            return false;
        }


        $heap = new SplMinHeap();

        foreach ($nums as $num){
            $heap->insert($num);
        }

        $pre = null;
        while ($heap->count()>=3){
            $count = 3;
            $list = [];
            $v = $heap->extract();
            if($v!==$pre && $v-$pre==1){
                $pre = $v;
                continue;
            }else{
                $list[] = $v;
            }
        }

    }
}