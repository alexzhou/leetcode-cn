package main

import "fmt"

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */

type ListNode struct {
	Val  int
	Next *ListNode
}

func createLink(link []int) *ListNode {
	var head *ListNode = &ListNode{Val: 0, Next: nil}
	flag := head
	for _, v := range link {
		node := &ListNode{
			Val:  v,
			Next: nil,
		}
		flag.Next = node
		flag = flag.Next
	}
	return head.Next
}

func printLink(node *ListNode) {
	for node != nil {
		fmt.Println(node)
		node = node.Next
	}
	fmt.Println()
}

/**
分拆奇偶链表 然后合并
*/
func oddEvenList(head *ListNode) *ListNode {
	if head == nil {
		return head
	}
	evenHead := head.Next
	odd := head
	even := evenHead
	for even != nil && even.Next != nil {
		odd.Next = even.Next
		odd = odd.Next
		even.Next = odd.Next
		even = even.Next
	}
	odd.Next = evenHead
	return head
}

func main() {
	node := createLink([]int{2, 1, 3, 5, 6, 4, 7})
	oddEvenList(node)
	printLink(node)
}
