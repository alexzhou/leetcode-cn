package main

import "fmt"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func createTree(l []int) *TreeNode {
	length := len(l)
	if length == 0 {
		return nil
	}
	var node *TreeNode = &TreeNode{l[0], nil, nil}
	for i := 1; i < length; i++ {
		if i%2 == 1 {
			node = insert(node, l[i], true)
		} else {
			node = insert(node, l[i], false)
		}
	}
	return node
}
func insert(t *TreeNode, v int, left bool) *TreeNode {
	if t == nil {
		return &TreeNode{v, nil, nil}
	}
	if left {
		t.Left = &TreeNode{v, nil, nil}
		return t
	}
	t.Right = &TreeNode{v, nil, nil}
	return t
}

func isSubStructure(A *TreeNode, B *TreeNode) bool {
	//b==nil ,nil 不是任何树的子树 所以只要b==nil 就是false,
	//如果b!=nil 的情况下a==nil 显然也是false,
	//所以只要a,b 其中一个是nil 就是false
	if A == nil || B == nil {
		return false
	}
	//如果A,B 不相等 再比较A的子树是否和B相等
	return compare(A, B) || isSubStructure(A.Left, B) || isSubStructure(A.Right, B)
}

func compare(a *TreeNode, b *TreeNode) bool {
	//fmt.Println(a)
	//fmt.Println(b)

	if b == nil {
		return true
	} //b已经到底了
	if a == nil {
		return false
	} //b没到底的情况下 a到底了
	if a.Val != b.Val {
		return false
	} else {
		return compare(a.Left, b.Left) && compare(a.Right, b.Right)
	}

}

func main() {
	//[4,2,3,4,5,6,7,8,9]
	//[4,8,9]
	a := []int{4, 2, 3, 4, 5, 6, 7, 8, 9}
	b := []int{4, 8, 9}
	A := createTree(a)
	B := createTree(b)
	result := isSubStructure(A, B)
	fmt.Print(result)
}
