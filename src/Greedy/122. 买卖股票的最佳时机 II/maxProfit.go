package main

import "fmt"

func maxProfit(prices []int) int {
	length := len(prices)
	max := func(a int, b int) int {
		if a >= b {
			return a
		}
		return b
	}
	var dp = make([][2]int, length)
	dp[0][0] = 0
	dp[0][1] = -prices[0]

	for i := 1; i < length; i++ {
		dp[i][0] = max(dp[i-1][0], dp[i-1][1]+prices[i])
		dp[i][1] = max(dp[i-1][1], dp[i-1][0]-prices[i])
	}
	return dp[length-1][0]
}

func main() {
	l := []int{7, 1, 5, 3, 6, 4}
	ans := maxProfit(l)
	fmt.Println(ans)
}
