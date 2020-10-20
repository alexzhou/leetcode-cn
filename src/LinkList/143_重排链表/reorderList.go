package main

import (
	"fmt"
)

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

func reorderList(head *ListNode) {
	v := head
	var list []*ListNode
	for v != nil {
		list = append(list, v)
		v = v.Next
	}
	left := 0
	right := len(list) - 1

	i := 0
	v = head
	for left <= right {
		if v != nil {
			curr := list[right]
			curr.Next = v.Next
			v.Next = curr
			v = v.Next.Next
			left++
			right--
		}
		i++
	}
	if v != nil {
		v.Next = nil
	}
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

func main() {

	head := createLink([]int{1, 2, 3, 4})
	printLink(head)

	reorderList(head)
	printLink(head)
}
