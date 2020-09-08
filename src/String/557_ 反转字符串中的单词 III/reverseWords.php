<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $len = strlen($s);
        $l = -1;
        $r = -1;
        for ($i=0;$i<$len;$i++){
            if($s[$i]==" "){
                if($r>$l){
                    $tempL = $l;
                    $tempR = $r;
                    while($tempL<$tempR){
                        $temp = $s[$tempL];
                        $s[$tempL] = $s[$tempR];
                        $s[$tempR] = $temp;
                        $tempL++;
                        $tempR--;
                    }
                }
                $l = $r = $i;
            }
            else{
                if($s[$i-1]==" " || $l==-1)$l = $i;
                $r = $i;
                if($r==$len-1){
                    if($r>$l){
                        $tempL = $l;
                        $tempR = $r;
                        while($tempL<$tempR){
                            $temp = $s[$tempL];
                            $s[$tempL] = $s[$tempR];
                            $s[$tempR] = $temp;
                            $tempL++;
                            $tempR--;
                        }
                    }
                }
            }

        }
        return $s;
    }

    /**
     * 官方实现 比自己写的优雅
     * @param $s
     * @return mixed
     */
    function reverseWordsV2($s)
    {
        $len = strlen($s);
        $i = 0;
        while ($i < $len) {
            $start = $i;
            while ($i < $len && $s[$i] != ' ') {
                $i++;
            }
            $left = $start;
            $right = $i - 1;
            while ($left < $right) {
                $temp = $s[$left];
                $s[$left] = $s[$right];
                $s[$right] = $temp;
                $left++;
                $right--;
            }
            while ($i < $len && $s[$i] == ' ') {
                $i++;
            }
        }
        return $s;
    }

}

$obj = new Solution();
print_r($obj->reverseWordsV2("Let's take LeetCode contest"));