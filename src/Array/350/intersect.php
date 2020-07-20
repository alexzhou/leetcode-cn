<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $map1 = [];
        foreach ($nums1 as $v){
            isset($map1[$v])?$map1[$v]+=1 : $map1[$v]=1;
        }
        $map2 = [];
        $result = [];
        foreach ($nums2 as $v){
            isset($map2[$v])?$map2[$v]+=1 : $map2[$v]=1;
            if(isset($map1[$v]) && ($map2[$v]==1 || $map2[$v]<=$map1[$v])){
                $result[] = $v;
            }
        }
        return $result;
    }
}
$obj = new Solution();
$nums1 = [4,9,5];
$nums2 = [9,4,9,8,4];
print_r($obj->intersect($nums1,$nums2));