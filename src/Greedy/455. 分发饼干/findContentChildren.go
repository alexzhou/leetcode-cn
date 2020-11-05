package _55__分发饼干

import "sort"

func findContentChildren(g []int, s []int) int {
	ls := len(s)
	lg := len(g)
	sort.Ints(g)
	sort.Ints(s)
	i := 0
	ans := 0
	for i < ls {
		if ans == lg {
			break
		}
		if s[i] >= g[ans] {
			ans += 1
		}
		i++
	}
	return ans
}
