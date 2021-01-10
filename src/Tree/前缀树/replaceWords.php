<?php
class Trie {
    public $root;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $obj = new stdClass();
        $obj->children = [];
        $obj->isWord = false;
        $this->root = $obj;
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $len = strlen($word);
        $curr = $this->root;
        for ($i=0;$i<$len;$i++){
            $chars = substr($word,0,$i+1);
            if(!isset($curr->children[$chars])){
                $obj = new stdClass();
                $obj->children = [];
                $obj->isWord = false;
                $curr->children[$chars] = $obj;
            }
            $curr = $curr->children[$chars];
        }
        $curr->isWord = true;
    }

    function search($word) {
        $len = strlen($word);
        $curr = $this->root;
        for ($i=0;$i<$len;$i++){
            $chars = substr($word,0,$i+1);
            if(!isset($curr->children[$chars])){
                break;
            }
            $curr = $curr->children[$chars];
            if ($curr->isWord){
                return $chars;
            }
        }
        return false;
    }
}
class Solution {

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence) {
        $obj = new Trie();
        foreach ($dictionary as $w){
            $obj->insert($w);
        }
        echo json_encode($obj);
        $list = explode(" ",$sentence);
        foreach ($list as &$word){
            $ret = $obj->search($word);
            if(!empty($ret)){
                $word = $ret;
            }
        }
        return implode(" ",$list);
    }
}

//["cat","bat","rat"]
//"the cattle was rattled by the battery"
$obj = new Solution();
$dictionary = ["cat","bat","rat"];
$sentence = "the cattle was rattled by the battery";
//$sentence = "cattle";
echo $obj->replaceWords($dictionary,$sentence);