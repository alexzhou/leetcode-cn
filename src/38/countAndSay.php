<?php
class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n) {
        $arr[1]='1';
        for ($i=2;$i<=$n;$i++){
            $preStr = $arr[$i-1];
            if(strlen($preStr)==1){
                $arr[$i] = '1'.$preStr;
                continue;
            }


            $countChar = $preStr[0];
            $count = 1;
            $str = '';
            for($j=1;$j<strlen($preStr);$j++){
                if($preStr[$j]==$countChar){
                    $count+=1;
                }else{
                    $str.= $count.$countChar;
                    $countChar = $preStr[$j];
                    $count = 1;
                }
                if($j==strlen($preStr)-1){
                    $str.= $count.$countChar;
                }
            }
            $arr[$i] = $str;
        }

        return $arr[$n];
    }
}

$obj = new Solution();
$arr = $obj->countAndSay(5);
print_r($arr);