<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $len1 = count($nums1);
        $len2 = count($nums2);
        //
        if($nums2[0]>=$nums1[$len1-1]){
            return ($nums2[0]+$nums1[$len1-1])/2;
        }elseif($nums2[0] < $len1[$len1-1] && $nums2[0] > $nums1[0] && $nums2[$len2-1] > $len1[$len1-1]){

        }elseif($nums2[0] > $len1[0] && $nums2[$len2-1] < $len1[$len1-1]){

        }elseif($nums2[$len2-1] < $len1[$len1-1] &&  $nums2[0] > $nums1[0] && $nums2[$len2-1] < $len1[$len1-1]){

        }elseif($nums2[$len2-1] <= $nums1[0]){
            return ($nums2[$len2-1]+$nums1[$len1-1])/2;
        }

    }
}
$obj = new Solution();
echo $obj->findMedianSortedArrays([1,3],[2]);