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
        $totalLen = $len1 + $len2;
        if($totalLen%2==1){
            $mid = floor($totalLen / 2);
            return $this->getKthElement($nums1,$nums2,$mid+1);
        }else{
            $midIndex1 = floor($totalLen / 2) - 1;
            $midIndex2 = floor($totalLen / 2);
            return ($this->getKthElement($nums1,$nums2,$midIndex1+1) + $this->getKthElement($nums1,$nums2,$midIndex2+1))/2.0;
        }
    }

    /**
     * 二分查找 找第K个小的元素
     * @param $nums1
     * @param $nums2
     * @param $k
     * @return mixed
     */
    function getKthElement($nums1 ,$nums2,$k){
        $length1 = count($nums1);$length2 = count($nums2);
        $index1 = 0; $index2 = 0;

        while (true) {
            // 边界情况
            if ($index1 == $length1) {
                return $nums2[$index2 + $k - 1];
            }
            if ($index2 == $length2) {
                return $nums1[$index1 + $k - 1];
            }
            if ($k == 1) {
                return min($nums1[$index1], $nums2[$index2]);
            }

            // 正常情况
            $half = floor($k / 2);
            $newIndex1 = min($index1 + $half, $length1) - 1;
            $newIndex2 = min($index2 + $half, $length2) - 1;
            $pivot1 = $nums1[$newIndex1]; $pivot2 = $nums2[$newIndex2];
            if ($pivot1 <= $pivot2) {
                $k -= ($newIndex1 - $index1 + 1);
                $index1 = $newIndex1 + 1;
            } else {
                $k -= ($newIndex2 - $index2 + 1);
                $index2 = $newIndex2 + 1;
            }
        }
    }
}
$obj = new Solution();
echo $obj->findMedianSortedArrays([],[2,3]);