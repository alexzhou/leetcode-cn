<?php
class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $len_a = strlen($a);
        $len_b = strlen($b);
        if($len_b > $len_a){
            $a = str_pad($a,$len_b,'0',STR_PAD_LEFT);
            $len = $len_b;
        }else{
            $b= str_pad($b,$len_a,'0',STR_PAD_LEFT);
            $len = $len_a;
        }
        $result = '';
        for ($i=$len-1;$i>=0;$i--){
            $v =  (int)($a[$i] + $b[$i])%2;
            $result= $v.$result;
            if($a[$i]+$b[$i] >= 2){
                if($i==0){
                    $result = '1'.$result;
                }else{
                    $a[$i-1]= (string)($a[$i-1]  + 1);
                }
            }
        }
        return $result;
    }
}
$a = "1010"; $b = "1011";
$obj = new Solution();
print_r($obj->addBinary($a, $b));