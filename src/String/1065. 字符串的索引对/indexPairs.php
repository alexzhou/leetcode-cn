<?php
class Solution {

    /**
     * @param String $text
     * @param String[] $words
     * @return Integer[][]
     */
    function indexPairs($text, $words) {
        //TODO
    }
}

$obj = new Solution();
//"thestoryofleetcodeandme"
//["story","fleet","leetcode"]
$text = "thestoryofleetcodeandme";
$words = ["story","fleet","leetcode"];
$result = $obj->indexPairs($text,$words);
var_dump($result);