package main

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

func isPalindrome(head *ListNode) bool {
	var list []int
	for head != nil {
		list = append(list, head.Val)
		head = head.Next
	}
	i, j := 0, len(list)-1
	for i <= j {
		if list[i] == list[j] {
			i++
			j--
		} else {
			return false
		}
	}
	return true
}

func isPalindrome2(head *ListNode) bool {

	var pre *ListNode

	var list []int
	for head != nil {
		list = append(list, head.Val)
		head = head.Next
	}
	i, j := 0, len(list)-1
	for i <= j {
		if list[i] == list[j] {
			i++
			j--
		} else {
			return false
		}
	}
	return true
}
