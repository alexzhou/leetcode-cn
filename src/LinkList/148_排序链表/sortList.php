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
     * @param ListNode $head
     * @return ListNode
     */
    function sortList($head) {
        $dummyHead = new ListNode(0);
        $dummyHead->next = $head;
        $p = $head;
        //计数长度
        $length = 0;
        while ($p) {
            ++$length;
            $p = $p->next;
        }

        //开始处理
        for ($size = 1; $size < $length; $size <<= 1) {
            $cur = $dummyHead->next;
            $tail = $dummyHead;

            while ($cur) {
                //拆分
                $left = $cur;
                $right = $this->cut($left, $size); // left->@->@ right->@->@->@...
                $cur = $this->cut($right, $size); // left->@->@ right->@->@  cur->@->...
                //合并
                $tail->next = $this->merge($left, $right);
                //移动尾部
                while ($tail->next) {
                    $tail = $tail->next;
                }
            }
        }
        return $dummyHead->next;
    }

    function cut($head, $n) {
        $p = $head;
        while (--$n && $p) {
            $p = $p->next;
        }
        if (!$p) return null;
        $next = $p->next;
        $p->next = null;
        return $next;
    }

    /**
     * 合并两个链表到一个新链表中 且 排序好
     * @param $l1
     * @param $l2
     * @return ListNode
     */
    function  merge($l1, $l2) {
        $p = $dummyHead = new ListNode(0);
        while ($l1 && $l2) {
            if ($l1->val < $l2->val) {
                $p->next = $l1;
                $p = $l1;
                $l1 = $l1->next;
            } else {
                $p->next = $l2;
                $p = $l2;
                $l2 = $l2->next;
            }
        }
        $p->next = $l1 ? $l1 : $l2;
        return $dummyHead->next;
    }
}

$obj = new Solution();
$head = createLinkNode([4,2,1,3]);
//printLinkNode($head);
$node = $obj->sortList($head);
printLinkNode($node);