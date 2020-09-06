<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        $res = '';
        for ($i=0;$i<$len;$i++){
            $s1 = $this->palindrome($s,$i,$i);
            $s2 = $this->palindrome($s,$i,$i+1);
            $tempLonger = strlen($s1) >= strlen($s2)? $s1:$s2;
            $res = strlen($res) >= strlen($tempLonger)? $res:$tempLonger;
        }

    }

    function palindrome(&$s,$l,$r){
        $len = strlen($s);
        while($l>=0 && $r<$len && $s[$l]==$s[$r]){
            $l--;
            $r++;
        }
        return substr($s,$l+1,$r-$l-1);
    }

    /**
     * 这个算法比较好理解 马拉车算法有点复杂 不方便记忆
     */
}