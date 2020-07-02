<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $s = trim($s);
        $len = strlen($s);
        $count = 0;
        for($i=$len-1;$i>=0;$i--){
            if($s[$i]===' ')break;
            $count++;
        }
        return $count;
    }
}
$str = " a";
$obj  = new Solution();
echo $obj->lengthOfLastWord($str);