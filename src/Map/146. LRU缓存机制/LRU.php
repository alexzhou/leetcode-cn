<?php
class Node{
    public $key;
    public $val;
    public $pre;
    public $next;
    function __construct($key,$val) {
        $this->key = $key;
        $this->val = $val;
    }
}
class LRUCache {
    private $capacity;
    private $size;
    private $head;
    private $tail;
    private $cache;
    /**
     * @param Integer $capacitys
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->cache = [];
        $this->head = new Node(null,null);
        $this->tail = new Node(null,null);
        $this->head->next = $this->tail;
	    $this->tail->pre = $this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->cache[$key])){
            $obj = $this->cache[$key];
            $this->removeNode($obj);
            $this->addToHead($obj);
            return $obj->val;
        }else{
            return -1;
        }
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(!isset($this->cache[$key])){
            $node = new Node($key,$value);
            $this->cache[$key] = $node;
            //add to head
            $this->addToHead($node);
            $this->size+=1;
            if ($this->size > $this->capacity){
                $old = $this->tail->pre;
                $this->removeNode($old);
                unset($this->cache[$old->key]);
                $this->size-=1;
            }
        }else{
            $node = $this->cache[$key];
            $node->val = $value;
            $this->removeNode($node);
            $this->addToHead($node);
        }
    }
    function removeNode($node){
        $node->pre->next = $node->next;
        $node->next->pre = $node->pre;
    }

    function addToHead($node){
        $node->pre = $this->head;
        $node->next = $this->head->next;
        $this->head->next->pre = $node;
        $this->head->next = $node;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */