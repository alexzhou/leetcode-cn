<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public $res;
    function permute($nums) {
        $this->backtrack($nums,[]);
        return $this->res;
    }

    function backtrack($nums,$track){
        $len = count($nums);
        if(count($track)==$len){
            $this->res[] = $track;
            return;
        }
        for($i=0;$i<$len;$i++){
            if(in_array($nums[$i],$track)){
                continue;
            }
            $track[] = $nums[$i];
            $this->backtrack($nums,$track);
            array_pop($track);
        }

    }
}