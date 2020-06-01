<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars) {
        $charsArr = str_split($chars);
        //print_r($charsArr);
        $char_len = strlen($chars);
        $len = 0;
        foreach ($words as $word){
            if(count($word) > $char_len)continue;
            $temp = $charsArr;
            $wordArr = str_split($word);
            $flag = 1;
            //print_r($wordArr);
            foreach ($wordArr as $w){
                //echo $w.PHP_EOL;
                $key = array_search($w,$temp);
               if($key !== false){
                   unset($temp[$key]);
               }else{
                   $flag = 0;
                   break;
               }
            }
            if($flag){
                $len += strlen($word);
            }
        }
        return $len;
    }

    function countCharacters2($words, $chars) {
        $charsMap = [];
        $c_len = strlen($chars);
        for ($i=0;$i<$c_len;$i++){
            isset($charsMap[$chars[$i]])?$charsMap[$chars[$i]]+=1 : $charsMap[$chars[$i]] =1;
        }
        $len = 0;
        foreach ($words as $word){
            $flag = 1;
            $wordMap = [];
            $w_len = strlen($word);
            if($w_len > $c_len)continue;
            for ($i=0;$i<$w_len;$i++){
                isset($wordMap[$word[$i]])?$wordMap[$word[$i]]+=1 : $wordMap[$word[$i]] =1;
            }
            foreach ($wordMap as $k=>$v){
                if(!isset($charsMap[$k]) || $charsMap[$k] < $v){
                    $flag = 0;
                    break;
                }
            }
            if($flag){
                $len += $w_len;
            }
        }

        return $len;
    }
}

$words = ["cat","bt","hat","tree"]; $chars = "atach";
$obj = new Solution();
echo $obj->countCharacters2($words,$chars).PHP_EOL; //6
