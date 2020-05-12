<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $flag = 0;
        $index = 0;

        $s_len = strlen($s);
        while ($flag <= $s_len-1){
            if($index >= strlen($t))break;
            if($t[$index]==$s[$flag]){
                $flag++;
            }
            $index++;
        }
        return $flag===$s_len;
    }
}

$s = 'axc';$t = 'ahbgdc';
$obj = new Solution();
var_dump($obj->isSubsequence($s,$t));