package main

import "math"

func findRotateSteps(ring string, key string) int {
	const inf = math.MaxInt64 / 2
	n, m := len(ring), len(key)
	pos := [26][]int{}
	//记录每个字母出现的位置，会有重复的字母
	for i, c := range ring {
		pos[c-'a'] = append(pos[c-'a'], i)
	}

	//定义dp[i][j] 表示从前往后拼写出 key 的第 ii 个字符，ring 的第 j 个字符与 12:00 方向对齐的最少步数（下标均从 0 开始）。
	dp := make([][]int, m)
	for i := range dp {
		dp[i] = make([]int, n)
		for j := range dp[i] {
			dp[i][j] = inf //初始化值
		}
	}

	//第一个key[0]字符
	for _, p := range pos[key[0]-'a'] {
		dp[0][p] = min(p, n-p) + 1
	}
	//递推其他key中的字符
	for i := 1; i < m; i++ {
		for _, j := range pos[key[i]-'a'] {
			for _, k := range pos[key[i-1]-'a'] {
				dp[i][j] = min(dp[i][j], dp[i-1][k]+min(abs(j-k), n-abs(j-k))+1)
			}
		}
	}
	return min(dp[m-1]...)
}

func min(a ...int) int {
	res := a[0]
	for _, v := range a[1:] {
		if v < res {
			res = v
		}
	}
	return res
}

func abs(x int) int {
	if x < 0 {
		return -x
	}
	return x
}
