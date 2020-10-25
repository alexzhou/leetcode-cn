package main

import "fmt"

//https://leetcode-cn.com/problems/longest-continuous-increasing-subsequence/
func findLengthOfLCIS(nums []int) int {
	l := len(nums)
	if l == 0 {
		return 0
	}
	var max int = 1
	a, b := 0, 0
	for i := 1; i < l; i++ {
		if nums[i] > nums[i-1] {
			b++
			if b-a+1 > max {
				max = b - a + 1
			}
		} else {
			a = i
			b = i
		}
		fmt.Printf("i=%d a:%d b=%d  max=%d \n", i, a, b, max)
	}
	return max
}

func main() {
	nums := []int{3, 0, 6, 2, 4, 7, 0, 0}
	ans := findLengthOfLCIS(nums)
	fmt.Println(ans)
}
