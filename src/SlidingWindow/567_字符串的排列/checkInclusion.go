package _67_字符串的排列

func checkInclusion(s1 string, s2 string) bool {
	k := len(s1)
	n := len(s2)
	left := 0
	right := 0

	freq := make(map[byte]int)
	for i := 0; i < k; i++ {
		freq[s1[i]]++
	}

	m := make(map[byte]int)
	for right < n {
		m[s2[right]]++
		if right-left+1 > k {
			m[s2[left]]--
			if m[s2[left]] == 0 {
				delete(m, s2[left])
			}
			left++
		}

		if compare(freq, m) {
			return true
		}

		right++
	}

	return false
}

func compare(a map[byte]int, b map[byte]int) bool {
	for i, v := range a {
		if b[i] != v {
			return false
		}
	}
	return true
}
