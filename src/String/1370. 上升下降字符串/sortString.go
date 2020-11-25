package main

import (
	"fmt"
	"sort"
	"strings"
)

func sortString(s string) string {
	list := strings.Split(s, "")

	m := make(map[string]int)

	for _, v := range list {
		m[v] += 1
	}
	sortList := make([]string, 0)

	for k, _ := range m {
		sortList = append(sortList, k)
	}
	sort.Strings(sortList)

	ans := make([]string, 0)

	i := 0
	isReverse := false
	l := len(s)
	for len(ans) < l {
		if i == len(sortList) {
			isReverse = true
			i--
		}
		if i == -1 {
			isReverse = false
			i++
		}
		if m[sortList[i]] > 0 {
			ans = append(ans, sortList[i])
			m[sortList[i]] -= 1
		}

		if isReverse {
			i--
		} else {
			i++
		}
		fmt.Printf(" s len = %d  ans len = %d", len(s), len(ans))
		fmt.Println(strings.Join(ans, ""))

	}

	return strings.Join(ans, "")
}

//官方答案
func sortString2(s string) string {
	cnt := ['z' + 1]int{}
	for _, ch := range s {
		cnt[ch]++
	}
	n := len(s)
	ans := make([]byte, 0, n)
	for len(ans) < n {
		for i := byte('a'); i <= 'z'; i++ {
			if cnt[i] > 0 {
				ans = append(ans, i)
				cnt[i]--
			}
		}
		for i := byte('z'); i >= 'a'; i-- {
			if cnt[i] > 0 {
				ans = append(ans, i)
				cnt[i]--
			}
		}
	}
	return string(ans)
}

func main() {
	ans := sortString("leetcode")
	fmt.Println(ans)
}
