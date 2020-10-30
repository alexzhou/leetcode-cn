package main

import (
	"math"
)

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

var sum int

func sumNumbers(root *TreeNode) int {
	path := make([]int, 0)
	travel(root, path)
	return sum
}
func travel(node *TreeNode, path []int) {
	if node.Left == nil && node.Right == nil {
		path = append(path, node.Val)
		l := len(path)
		j := l - 1
		for i := 0; i < l; i++ {
			sum += path[i] * int(math.Pow10(j))
			j--
		}
	} else {
		path = append(path, node.Val)
		if node.Left != nil {
			travel(node.Left, path)
		}
		if node.Right != nil {
			travel(node.Right, path)
		}
	}
}
