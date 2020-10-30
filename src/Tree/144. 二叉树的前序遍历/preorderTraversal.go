package _44__二叉树的前序遍历

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

func preorderTraversal(root *TreeNode) []int {
	arr := make([]int, 0)
	traversal(root, arr)
	return arr
}

func traversal(node *TreeNode, l []int) []int {
	if node != nil {
		l = append(l, node.Val)
		if node.Left != nil {
			traversal(node.Left, l)
		}
		if node.Right != nil {
			traversal(node.Right, l)
		}
	}
}
