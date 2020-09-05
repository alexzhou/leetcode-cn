<?php
class Solution {

    /**
     * @param String[] $stickers
     * @param String $target
     * @return Integer
     */
    function minStickers($stickers, $target) {
        $list = [];
        foreach ($stickers as $word){
            $list[$word] = $this->powerSet($word);
        }

        $targetSet = $this->powerSet($target);


    }

    function powerSet($nums){
        $res = [];
        $len = count($nums);
        $maxValue = pow(2,$len)-1;
        for($i=1;$i<=$maxValue;$i++){
            $str = decbin($i);
            $str = str_pad($str,$len,'0',STR_PAD_LEFT);
            $subset = [];
            for ($j=0;$j<$len;$j++){
                if($str[$j]){
                    $subset[] = $nums[intval($j)];
                }
            }
            $res[] = $subset;
        }
        return $res;
    }
}