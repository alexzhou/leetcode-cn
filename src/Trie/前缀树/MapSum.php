<?php

class MapSum {
    public $root;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $obj = new stdClass();
        $obj->key = '';
        $obj->children = [];
        $obj->isWord = false;
        $obj->value = 0;
        $this->root = $obj;
    }

    /**
     * @param String $key
     * @param Integer $val
     * @return NULL
     */
    function insert($key, $val) {
        $len = strlen($key);
        $curr = $this->root;
        for($i=0;$i<$len;$i++){
            $char = $key[$i];
            if(!isset($curr->children[$char])){
                $obj = new stdClass();
                $obj->key = $char;
                $obj->children = [];
                $obj->isWord = false;
                $obj->value = 0;
                $curr->children[$char] = $obj;
            }
            $curr = $curr->children[$char];
        }
        $curr->isWord = true;
        $curr->value = $val;
    }

    /**
     * @param String $prefix
     * @return Integer
     */
    function sum($prefix) {
        //find
        $len = strlen($prefix);
        $curr = $this->root;
        for ($i=0;$i<$len;$i++){
            $char = $prefix[$i];
            if(!isset($curr->children[$char])){
                return 0;
            }
            $curr = $curr->children[$char];
        }

        $ans = 0;
        $queue = [$curr];
         while (count($queue) >0 ){
             $len = count($queue);
             for ($i=0;$i<$len;$i++){
                 $curr = array_shift($queue);
                 if($curr->isWord){
                     $ans += $curr->value;
                 }
                 if(count($curr->children)){
                     foreach ($curr->children as $child){
                         array_push($queue,$child);
                     }
                 }
             }
         }
         return $ans;
    }
}

/**
 * Your MapSum object will be instantiated and called as such:
 * $obj = MapSum();
 * $obj->insert($key, $val);
 * $ret_2 = $obj->sum($prefix);
 */