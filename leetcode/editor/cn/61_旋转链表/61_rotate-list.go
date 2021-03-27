package main

import . "leetcode/common"

//给你一个链表的头节点 head ，旋转链表，将链表每个节点向右移动 k 个位置。
//
//
//
// 示例 1：
//
//
//输入：head = [1,2,3,4,5], k = 2
//输出：[4,5,1,2,3]
//
//
// 示例 2：
//
//
//输入：head = [0,1,2], k = 4
//输出：[2,0,1]
//
//
//
//
// 提示：
//
//
// 链表中节点的数目在范围 [0, 500] 内
// -100 <= Node.val <= 100
// 0 <= k <= 2 * 109
//
// Related Topics 链表 双指针
// 👍 470 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func rotateRight(head *ListNode, k int) *ListNode {
	if head == nil {
		return nil
	}
	//确定长度和尾部
	tail := head
	n := 1
	for tail.Next != nil {
		tail = tail.Next
		n++
	}
	//k值
	k = k % n
	if k == 0 {
		return head
	}
	//形成环
	tail.Next = head

	//正向切开点
	cutPoint := n - k
	flag := head
	cutPoint--
	for cutPoint > 0 {
		flag = flag.Next
		cutPoint--
	}
	//断开
	head = flag.Next
	flag.Next = nil

	//返回
	return head
}

//leetcode submit region end(Prohibit modification and deletion)
