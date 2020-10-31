package main

import "fmt"

func lengthOfLongestSubstring(s string) int {
	l := len(s)
	m := make(map[byte]int)
	ans := 0
	j := -1 //这个是关键 能很好的处理边界问题
	for i := 0; i < l; i++ {
		if i > 0 {
			delete(m, s[i-1])
		}
		for j < l-1 && m[s[j+1]] == 0 {
			m[s[j+1]]++
			j++
		}

		if j-i+1 > ans {
			ans = j - i + 1
		}

	}
	return ans
}

func main() {
	s := "bbbbb"
	fmt.Println(lengthOfLongestSubstring(s))
}
