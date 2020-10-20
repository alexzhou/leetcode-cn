package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */

/**
线性表
时间复杂度：O(N)O(N)，其中 NN 是链表中的节点数。
空间复杂度：O(N)O(N)，其中 NN 是链表中的节点数。主要为线性表的开销。
*/
func reorderList3(head *ListNode) {
	if head == nil {
		return
	}
	nodes := []*ListNode{}
	for node := head; node != nil; node = node.Next {
		nodes = append(nodes, node)
	}
	i, j := 0, len(nodes)-1
	for i < j {
		nodes[i].Next = nodes[j]
		i++
		if i == j {
			break
		}
		nodes[j].Next = nodes[i]
		j--
	}
	nodes[i].Next = nil
}
