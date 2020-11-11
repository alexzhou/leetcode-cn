package _76__栅栏涂色

func numWays(n int, k int) int {
	if n == 0 || k == 0 {
		return 0
	}
	//init
	dp := make([][]int, n+1)
	dp[1] = make([]int, 2)
	dp[1][0] = k
	dp[1][1] = 0

	for i := 2; i <= n; i++ {
		dp[i] = make([]int, 2)
		dp[i][0] = (k - 1) * (dp[i-1][0] + dp[i-1][1])
		dp[i][1] = dp[i-1][0]
	}
	return dp[n][0] + dp[n][1]

}
