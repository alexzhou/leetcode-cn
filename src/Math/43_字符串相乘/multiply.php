<?php
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        if($num2=='0' || $num1=='0')return '0';
        $len1 = strlen($num1);
        $len = strlen($num2)+$len1;
        $list=[];
        for($i=$len1-1;$i>=0;$i--){
            $tempCarry=0;
            $v = '';
            for($k=strlen($num2)-1;$k>=0;$k--){
                $tempV = $num2[$k]*$num1[$i]+$tempCarry ;
                $v = ($tempV%10).$v;
                $tempCarry = floor($tempV/10);
            }
            $v = $tempCarry.$v;
            $v = str_pad($v,strlen($v)+($len1-1-$i),'0',STR_PAD_RIGHT);
            $v = str_pad($v,$len,'0',STR_PAD_LEFT);
            $list[$i] = $v;
        }
        if(count($list)==1)return ltrim($list[0],'0');
        $carry = 0;
        $str = '';
        for($j=$len-1;$j>=0;$j--){
            $sum = 0;
            foreach ($list as $row){
                $sum+=$row[$j];
            }
            $sum +=$carry;
            $carry = floor($sum/10);
            $char = strval($sum%10);
            $str = $char.$str;
        }
        return ltrim($str,'0');
    }
}
$obj = new Solution();
echo $obj->multiply("2", "3");