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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $first = 0;
        $head = $next = null;
        $flag = 0;
        while ($l1!==null || $l2!==null){
            if($l1===null && $l2!==null){
                $v = $l2->val;
            }else if($l1!==null && $l2===null){
                $v = $l1->val;
            }else{
                $v = $l1->val + $l2->val;
            }
            $v = $v+$flag;
            $flag = floor($v/10);
            if($first===0){
                $head = $next = new ListNode($v%10);
                $first =1;
            }else{
                $next->next = new ListNode($v%10);
                $next = $next->next;
            }
            $l1 = $l1->next;
            $l2 = $l2->next;
        }
        if($flag>0){
            $next->next = new ListNode($flag);
        }
        return $head;
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
$obj = new Solution();
$l1 = createLinkNode([2,4,3]);
$l2 = createLinkNode([5,6,4]);
printLinkNode($l1);
echo PHP_EOL;
printLinkNode($l2);
echo PHP_EOL;
$l = $obj->addTwoNumbers($l1,$l2);
printLinkNode($l);