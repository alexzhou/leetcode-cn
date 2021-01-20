package _21_账户合并

import "sort"

func accountsMerge(accounts [][]string) [][]string {
	emailToIndex := map[string]int{}
	emailToName := map[string]string{}
	for _, account := range accounts {
		name := account[0]
		for _, email := range account[1:] {
			if _, has := emailToIndex[email]; !has {
				emailToIndex[email] = len(emailToIndex)
				emailToName[email] = name
			}
		}
	}

	//并查集 init
	parent := make([]int, len(emailToIndex))
	for i := range parent {
		parent[i] = i
	}
	//find
	var find func(int) int
	find = func(x int) int {
		if parent[x] != x {
			parent[x] = find(parent[x])
		}
		return parent[x]
	}
	//union
	union := func(from, to int) {
		parent[find(from)] = find(to)
	}

	//先union
	for _, account := range accounts {
		firstIndex := emailToIndex[account[1]]
		for _, email := range account[2:] {
			union(emailToIndex[email], firstIndex) //链接每一组email
		}
	}

	//后find
	indexToEmails := map[int][]string{}
	for email, index := range emailToIndex {
		index = find(index)
		indexToEmails[index] = append(indexToEmails[index], email)
	}

	var ans [][]string
	for _, emails := range indexToEmails {
		sort.Strings(emails)
		account := append([]string{emailToName[emails[0]]}, emails...)
		ans = append(ans, account)
	}
	return ans
}
