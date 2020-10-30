package _29__求根到叶子节点数字之和

import "math"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func sumNumbers(root *TreeNode) int {
	var path []int
	var sum int = 0
	if root == nil {
		return 0
	}
	travel(root, path, &sum)
	return sum
}
func travel(node *TreeNode, path []int, sum *int) {
	if node.Left == nil && node.Right == nil {
		path = append(path, node.Val)
		l := len(path)
		j := l - 1
		for i := 0; i < l; i++ {
			*sum += path[i] * int(math.Pow10(j))
			j--
		}
	} else {
		path = append(path, node.Val)
		if node.Left != nil {
			travel(node.Left, path, sum)
		}
		if node.Right != nil {
			travel(node.Right, path, sum)
		}
	}
}
