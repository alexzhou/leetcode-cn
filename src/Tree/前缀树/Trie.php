<?php


class Trie {
    /**
     * Initialize your data structure here.
     */

    public $root;
    function __construct() {
        $this->root = [
            'isWord'=>false,
            'children'=>[]
        ];
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $len = strlen($word);
        $curr = &$this->root;
        for($i=0;$i<$len;$i++){
            $char = $word[$i];
            if(!isset($curr['children'][$char])){
                $curr['children'][$char] = [];
            }
            $curr = &$curr['children'][$char];
        }
        $curr['isWord'] = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $len = strlen($word);
        $curr = &$this->root;
        for($i=0;$i<$len;$i++){
            $char = $word[$i];
            if(!isset($curr['children'][$char])){
                return false;
            }
            $curr = &$curr['children'][$char];
        }
        return $curr['isWord']===true;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $len = strlen($prefix);
        $curr = &$this->root;
        for($i=0;$i<$len;$i++){
            $char = $prefix[$i];
            if(!isset($curr['children'][$char])){
                return false;
            }
            $curr = &$curr['children'][$char];
        }
        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
$obj = new Trie();
$ret_1 = $obj->insert("apple");
$ret_2 = $obj->search("apple");
$ret_3 = $obj->search("app");
$ret_4 = $obj->startsWith("app");
$ret_5 = $obj->insert("app");
$ret_6 = $obj->search("app");
var_dump($ret_6);
//var_dump($ret_2);
//print_r($ret_3);