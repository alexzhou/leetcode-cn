package main

import "fmt"

func findMaxConsecutiveOnes(nums []int) int {
	n := len(nums)
	left, right, ans := 0, 0, 0

	for right < n {
		if nums[right] == 0 {
			ans = max(ans, right-1-left+1)
			right++
			left = right
		} else {
			right++
		}

		fmt.Printf("left %v right %v \n", left, right)
	}
	ans = max(ans, right-1-left+1)
	return ans
}

func max(a int, b int) int {
	if a > b {
		return a
	}
	return b
}

func main() {
	nums := []int{1, 1, 0, 1, 1, 1}
	ans := findMaxConsecutiveOnes(nums)
	fmt.Println(ans)
}
