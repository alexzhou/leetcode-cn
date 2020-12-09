<?php
class Solution {

    /**
     * @param String $S
     * @return Integer[]
     */
    function splitIntoFibonacci($S) {
        $res = [];
        $this->backtrack($S,$res,0);
        return $res;
    }


    function backtrack($str,&$res,$index){
        if($index==strlen($str)&&count($res)>=3){
            return true;
        }

        for($i=$index;$i<strlen($str);$i++){
            //剪枝
            if($str[$index]=='0' && $i>$index){
                 break;
            }
            $num = intval(substr($str,$index,$i+1-$index));
            if($num > pow(2,31)-1){
                break;
            }
            $size = count($res);
            if($size>=2 && $num > ($res[$size-1]+$res[$size-2]) ){
                break;
            }
            //end 剪枝
            if($size<=1 || $num == ($res[$size-1]+$res[$size-2]) ){
                //echo $num.PHP_EOL;
                array_push($res,$num);
                if($this->backtrack($str,$res,$i+1)){
                    return true;
                }
                array_pop($res);
            }
        }
    }
}

$str = "0123";
$obj  = new Solution();
$res = $obj->splitIntoFibonacci($str);
print_r($res);