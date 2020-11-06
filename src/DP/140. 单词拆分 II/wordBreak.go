package _40__单词拆分_II

func wordBreak(s string, wordDict []string) []string {
	length := len(s)

	wordMap := make(map[string]bool, 0)
	for _, v := range wordDict {
		wordMap[v] = true
	}

	/*
	   dp 处理，dp[i] 表示 [0, i] 是否能够 通过分割 或 不分割 使得处理后的字符串存在于字典中
	   比如  s = catsand, wordDict = ["cat", "sand"]
	   我们可以通过分割成 cat 和 sand 使得分割后的字符串存在于字典中, dp[i] = true;
	   比如  s = catsand, wordDict = ["catsand"]
	   我们可以不分割就使得原字符串存在于字典中, dp[i] = true;
	   比如  s = catsand, wordDict = ["cats"]
	   我们无论分割还是不分割都无法使得字符串都存在于字典中, dp[i] = false;
	*/
	dp := make([]bool, length+1)
	dp[0] = true
	for i := 1; i <= length; i++ {
		for j := 0; j < i; j++ {
			sub := s[j:i]
			if dp[j] && wordMap[sub] {
				dp[i] = true
			}
		}
	}
	//原字符串 s 无法处理成字典中的字符串
	if !dp[length] {
		return []string{}
	}
	ans := make(map[int][]string)
	for i := 0; i <= length; i++ {
		ans[i] = []string{}
	}
	for i := 1; i <= length; i++ {
		if !dp[i] {
			continue
		}
		for j := 0; j < i; j++ {
			//两个集合都判断
			if !dp[j] {
				continue
			}
			str := s[j:i]
			if !wordMap[str] {
				continue
			}
			//end

			if len(ans[j]) == 0 {
				ans[i] = append(ans[i], str)
			} else {
				for _, ss := range ans[j] {
					newStr := ss + " " + str
					ans[i] = append(ans[i], newStr)
				}
			}
		}
	}
	return ans[length]
}
