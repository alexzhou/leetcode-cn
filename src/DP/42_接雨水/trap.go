package main

//https://leetcode-cn.com/problems/trapping-rain-water/solution/wei-en-tu-jie-fa-zui-jian-dan-yi-dong-10xing-jie-j/
func trap(height []int) int {
	n := len(height)
	s1, s2 := 0, 0
	max1, max2 := 0, 0
	sum := 0
	for i := 0; i < n; i++ {
		if height[i] > max1 {
			max1 = height[i]
		}
		if height[n-i-1] > max2 {
			max2 = height[n-i-1]
		}
		s1 += max1 //累加每一列 1*max1
		s2 += max2
		sum += height[i]
	}
	ans := s1 + s2 - max1*n - sum
	return ans
}

//常规解法
//https://leetcode-cn.com/problems/trapping-rain-water/solution/jie-yu-shui-by-leetcode/
