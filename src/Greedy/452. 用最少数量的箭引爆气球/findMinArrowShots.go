package main

import (
	"fmt"
	"sort"
)

func findMinArrowShots(points [][]int) int {
	l := len(points)
	if l == 0 {
		return 0
	}
	if l == 1 {
		return 1
	}
	sort.SliceStable(points, func(i, j int) bool {
		return points[i][0] < points[j][0]
	})
	pre := points[0]
	ans := 0
	for i := 1; i < l; i++ {
		curr := points[i]
		if curr[0] <= pre[1] {
			pre[0] = curr[0]
			pre[1] = min(pre[1], curr[1])
		} else {
			ans += 1
			pre = curr
		}
	}
	ans += 1
	return ans
}

func min(a int, b int) int {
	if a < b {
		return a
	}
	return b
}

func main() {
	//[[10,16],[2,8],[1,6],[7,12]]
	points := [][]int{
		{1, 2}, {2, 3}, {3, 4}, {4, 5},
	}
	ans := findMinArrowShots(points)
	fmt.Println(ans)
}
