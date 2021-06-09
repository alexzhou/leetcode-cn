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
            $char = $word[$i];
            if(!isset($curr->children[$char])){
                $obj = new stdClass();
                $obj->children = [];
                $obj->isWord = false;
                $curr->children[$char] = $obj;
            }
            $curr = $curr->children[$char];
        }
        $curr->isWord = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $len = strlen($word);
        $curr = $this->root;
        for ($i=0;$i<$len;$i++){
            $char = $word[$i];
            if(!isset($curr->children[$char])){
                return false;
            }
            $curr = $curr->children[$char];
        }
        return $curr->isWord;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $len = strlen($prefix);
        $curr = $this->root;
        for ($i=0;$i<$len;$i++){
            $char = $prefix[$i];
            if(!isset($curr->children[$char])){
                return false;
            }
            $curr = $curr->children[$char];
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