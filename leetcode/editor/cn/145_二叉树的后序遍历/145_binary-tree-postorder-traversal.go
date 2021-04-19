package main

//给定一个二叉树，返回它的 后序 遍历。
//
// 示例:
//
// 输入: [1,null,2,3]
//   1
//    \
//     2
//    /
//   3
//
//输出: [3,2,1]
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树
// 👍 569 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
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

func postorderTraversal(root *TreeNode) []int {
	ans := make([]int, 0)
	dfs(root, &ans)
	return ans
}

func dfs(node *TreeNode, list *[]int) {
	if node == nil {
		return
	}
	if node.Left != nil {
		dfs(node.Left, list)
	}
	if node.Right != nil {
		dfs(node.Right, list)
	}
	*list = append(*list, node.Val)
}

//leetcode submit region end(Prohibit modification and deletion)
