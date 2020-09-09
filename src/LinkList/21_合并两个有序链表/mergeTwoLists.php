<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
function printLinkNode($head){
    while ($head!=NULL){
        echo $head->val."\t";
        $head = $head->next;
    }
    echo PHP_EOL;
}

function createLinkNode($arr){
    $head=$node = new ListNode($arr[0]);
    for ($i=1;$i<count($arr);$i++){
        $node->next = new ListNode($arr[$i]);
        $node = $node->next;
    }
    return $head;
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $head  = $current = new ListNode();
        $head1 = $l1;
        $head2 = $l2;
        while ($head1!==null || $head2!==null){
            if($head1===null && $head2!==null){
                $current->next = $head2;
                $head2 = null;
            }else if($head1!==null && $head2===null){
                $current->next = $head1;
                $head1 = null;
            }else{
                if($head1->val <= $head2->val){
                    $current->next = $head1;
                    $head1 = $head1->next;
                }else{
                    $current->next = $head2;
                    $head2 = $head2->next;
                }
                $current = $current->next;
            }
        }
        return $head->next;
    }
}
$obj = new Solution();
$l1 = createLinkNode([2,3,4]);
$l2 = createLinkNode([4,5,6]);
printLinkNode($l1);
echo PHP_EOL;
printLinkNode($l2);
echo PHP_EOL;
$node = $obj->mergeTwoLists($l1,$l2);
printLinkNode($node);
echo PHP_EOL;