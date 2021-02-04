package main

func findMaxAverage(nums []int, k int) float64 {
	length := len(nums)
	var sum int
	for i := 0; i < k; i++ {
		sum += nums[i]
	}
	var ans int = sum
	for i := 1; i <= length-k; i++ {
		sum = sum - nums[i-1] + nums[i+k-1]
		ans = max(ans, sum)
	}
	return float64(ans) / float64(k)
}

func max(a int, b int) int {
	if a >= b {
		return a
	}
	return b
}
