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
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        //确定尾部和长度
        $tail = $head;
        $len = 1;
        while ($tail->next!==null){
            $tail = $tail->next;
            $len++;
        }
        $k = $k%$len;
        if($k%$len == 0 )return $head;
        //形成环
        $tail->next = $head;
        //计数然后在计数停止位置断开环
        $cutPoint = $len-$k;
        $flag = $head;
        $cutPoint--;
        while ($cutPoint>0){
            $cutPoint--;
            $flag = $flag->next;
        }
        $head = $flag->next;
        $flag->next = null;
        return $head;
    }
}
$node = createLinkNode([1]);
printLinkNode($node);
$obj = new Solution();
$node = $obj->rotateRight($node,1);
printLinkNode($node);
