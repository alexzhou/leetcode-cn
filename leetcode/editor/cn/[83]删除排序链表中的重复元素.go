package main
//存在一个按升序排列的链表，给你这个链表的头节点 head ，请你删除所有重复的元素，使每个元素 只出现一次 。 
//
// 返回同样按升序排列的结果链表。 
//
// 
//
// 示例 1： 
//
// 
//输入：head = [1,1,2]
//输出：[1,2]
// 
//
// 示例 2： 
//
// 
//输入：head = [1,1,2,3,3]
//输出：[1,2,3]
// 
//
// 
//
// 提示： 
//
// 
// 链表中节点数目在范围 [0, 300] 内 
// -100 <= Node.val <= 100 
// 题目数据保证链表已经按升序排列 
// 
// Related Topics 链表 
// 👍 511 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func deleteDuplicates(head *ListNode) *ListNode {
	if head==nil {
		return nil
	}
	dump  := &ListNode{-200,head}
	count := make(map[int]int,0)
	node :=head
	for node!=nil{
		count[node.Val]+=1
		node = node.Next
	}


	if len(count)==1 && count[head.Val] >1 {
		head.Next = nil
		return head
	}
	fast :=head
	slow := dump
	for fast !=nil{
		if count[fast.Val] > 1 {
			fast = fast.Next
			count[fast.Val]--;
			if fast == nil {//最后几个是重复的
				slow.Next = nil
			}
		}else{
			slow.Next = fast //链接新节点
			slow = fast //挪动slow
			fast = fast.Next //挪动fast
		}
	}
	return dump.Next
}
//leetcode submit region end(Prohibit modification and deletion)
