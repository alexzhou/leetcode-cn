<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $stack = [];
        while ($head!=NULL){
            $stack[] = $head->val;
            $head = $head->next;
        }
        $newHead = $node = new ListNode(array_pop($stack));
        while ( !is_null($val = array_pop($stack))){
            $node->next = new ListNode($val);
            $node = $node->next;
        }
        return $newHead;
    }

    /**
     * 官方解法 优雅
     * @param $head
     * @return null
     */
    function reverseListV2($head){
        $prev = null;
        $curr = $head;
        while ($curr !== null) {
            $nextTemp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $nextTemp;
        }
        return $prev;
    }
}

function printLinkNode($head){
    while ($head!=NULL){
        echo $head->val."\t";
        $head = $head->next;
    }
}

function createLinkNode($arr){
    $head=$node = new ListNode($arr[0]);
    for ($i=1;$i<count($arr);$i++){
        $node->next = new ListNode($arr[$i]);
        $node = $node->next;
    }
    return $head;
}


$head = createLinkNode([1,2,3,4,5]);
printLinkNode($head);
$obj = new Solution();
$node = $obj->reverseListV2($head);
printLinkNode($node);