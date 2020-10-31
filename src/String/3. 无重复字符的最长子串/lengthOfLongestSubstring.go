package main

import "fmt"

func lengthOfLongestSubstring(s string) int {
	l := len(s)
	m := make(map[byte]int)
	ans := 0
	j := 0
	for i := 0; i < l; i++ {
		if i > 0 {
			delete(m, s[i-1])
		}
		for j < l-1 && m[s[j]] == 0 {
			m[s[j]]++
			j++
		}
		if j-i > ans {
			ans = j - i
		}
		fmt.Printf("i %d j %d \n", i, j)
	}
	return ans
}

func main() {
	s := "b"
	fmt.Println(lengthOfLongestSubstring(s))
}
