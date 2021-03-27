<?php
//给你单链表的头指针 head 和两个整数 left 和 right ，其中 left <= right 。请你反转从位置 left 到位置 right 的链
//表节点，返回 反转后的链表 。
// 
//
// 示例 1： 
//
// 
//输入：head = [1,2,3,4,5], left = 2, right = 4
//输出：[1,4,3,2,5]
// 
//
// 示例 2： 
//
// 
//输入：head = [5], left = 1, right = 1
//输出：[5]
// 
//
// 
//
// 提示： 
//
// 
// 链表中节点数目为 n 
// 1 <= n <= 500 
// -500 <= Node.val <= 500 
// 1 <= left <= right <= n 
// 
//
// 
//
// 进阶： 你可以使用一趟扫描完成反转吗？ 
// Related Topics 链表 
// 👍 826 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
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
class Solution {
    /**
     * @param ListNode $head
     */
    function reverseLinkList($head){
        $dumpHead = new ListNode();
        $node = $head;
        while ($node){
            $next = $node->next;

            $node->next = $dumpHead->next;
            $dumpHead->next = $node;

            $node = $next;
        }
        return $dumpHead->next;
    }
    /**
     * @param ListNode $head
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    function reverseBetween($head, $left, $right) {

        $dumpHead = new ListNode();
        $dumpHead->next = $head;
        $preNode = $dumpHead;
        for($i=1;$i<$left;$i++){
            $preNode = $preNode->next;
        }
        //pre is the left node of $left
        $rightNode = $preNode;
        for($i=$left;$i<=$right;$i++){
            $rightNode = $rightNode->next;
        }
        //the tail of linknodes
        $tail = $rightNode->next;

        //cut sub link of the whole link
        $leftNode = $preNode->next;
        $rightNode->next = null;

        //revers the sub
        $list = $this->reverseLinkList($leftNode);

        //put back
        $preNode->next = $list;
        $leftNode->next = $tail;

        return $dumpHead->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
