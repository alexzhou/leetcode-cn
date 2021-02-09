package main

import "fmt"

func subarraysWithKDistinct(A []int, K int) int {
	return mostWithK(A, K) - mostWithK(A, K-1)
}
func mostWithK(A []int, K int) int {
	n := len(A)
	var ans int
	left := 0
	right := 0
	count := 0
	freq := make(map[int]int)
	for right < n {
		if freq[A[right]] == 0 {
			count++
		}
		freq[A[right]]++
		right++
		for count > K {
			freq[A[left]]--
			if freq[A[left]] == 0 {
				count--
			}
			left++
		}
		ans += right - left
	}
	return ans
}

func main() {
	list := []int{1, 2, 1, 3, 4}
	k := 3
	ans := subarraysWithKDistinct(list, k)
	fmt.Println(ans)
}
