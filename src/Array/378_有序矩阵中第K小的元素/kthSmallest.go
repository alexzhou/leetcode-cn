package main

import "fmt"

func kthSmallest(matrix [][]int, k int) int {
	n := len(matrix)
	left, right := matrix[0][0], matrix[n-1][n-1]
	for left < right {
		mid := left + (right-left)/2  //中间值 不是中间坐标
		if check(matrix, mid, k, n) { //小于中间值的数量是不是比K多，多的话在左边 收窄范围right=mid
			right = mid
		} else {
			left = mid + 1 //比K少的话 第K个小值在右边
		}
	}
	return left
}

func check(matrix [][]int, mid, k, n int) bool {
	i, j := n-1, 0
	num := 0
	for i >= 0 && j < n {
		if matrix[i][j] <= mid { //最左边小于mid ，继续向右
			num += i + 1
			j++
		} else { //大于mid 向上移动
			i--
		}
	}
	return num >= k
}

func main() {
	matrix := [][]int{
		{1, 5, 9},
		{10, 11, 13},
		{12, 13, 15},
	}
	k := 8

	fmt.Println(kthSmallest(matrix, k))

}
