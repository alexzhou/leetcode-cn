package main

import (
	"fmt"
	"sort"
)

func groupAnagrams(strs []string) [][]string {

	l := len(strs)
	m := make(map[string][]int)
	for i := 0; i < l; i++ {
		chs := []byte(strs[i])
		sort.Slice(chs, func(a, b int) bool {
			return chs[a] < chs[b]
		})
		key := string(chs)
		m[key] = append(m[key], i)
	}

	var ans [][]string
	for _, v := range m {
		var temp []string
		for _, j := range v {
			temp = append(temp, strs[j])
		}
		ans = append(ans, temp)
	}
	fmt.Println(m)
	return ans
}

func main() {
	str := []string{"eat", "tea", "tan", "ate", "nat", "bat"}
	ans := groupAnagrams(str)
	fmt.Println(ans)
}
