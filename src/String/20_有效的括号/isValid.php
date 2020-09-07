<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $len = strlen($s);
        $stack =[];
        array_push($stack,$s[0]);
        for($i=1;$i<$len;$i++){
            array_push($stack,$s[$i]);
            $stackLen = count($stack);
            if($stack[$stackLen-1]==')'){
                if($stack[$stackLen-2]=='('){
                    array_pop($stack);
                    array_pop($stack);
                }
            }else if($stack[$stackLen-1]==']'){
                if($stack[$stackLen-2]=='['){
                    array_pop($stack);
                    array_pop($stack);
                }
            }else if($stack[$stackLen-1]=='}'){
                if($stack[$stackLen-2]=='{'){
                    array_pop($stack);
                    array_pop($stack);
                }
            }
        }
        return count($stack)?false:true;
    }
}
$s = "()[]{}";
$obj = new Solution();
var_dump($obj->isValid($s));