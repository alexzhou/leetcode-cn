<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $minLen = null;
        //求出最短
        foreach ($strs as $str){
            if(is_null($minLen)){
                $minLen= strlen($str);
            }else{
                $minLen = min($minLen,strlen($str));
            }
        }
        //纵向比较
        $result = "";
        for($i=0;$i<$minLen;$i++){
            $map = [];
            foreach ($strs as $str){
                $map[$str[$i]]= isset($map[$str[$i]])?$map[$str[$i]]+=1:1;
                if(count($map)>=2){
                    break 2;
                }
            }
            $result .= $strs[0][$i];
        }
        return $result;
    }
}