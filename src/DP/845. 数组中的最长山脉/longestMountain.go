package main

//DP
func longestMountain(A []int) int {
	var ans int
	n := len(A)
	left := make([]int, n) //left[i] 表示 A[i]向左侧最多可以扩展的元素数目
	for i := 1; i < n; i++ {
		if a[i-1] < A[i] {
			left[i] = left[i-1] + 1
		}
	}
	right := make([]int, n) //right[i] 表示 A[i] 向右侧最多可以扩展的元素数目
	for i := n - 2; i >= 0; i-- {
		if A[i+1] < A[i] {
			right[i] = right[i+1] + 1
		}
	}
	for i, l := range left {
		r := right[i]
		if l > 0 && r > 0 && l+r+1 > ans {
			ans = l + r + 1
		}
	}
	max
	return ans
}

func main() {

}
