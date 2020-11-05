package _27__单词接龙

func ladderLength(beginWord string, endWord string, wordList []string) int {
	wordMap := map[string]bool{}
	for _, w := range wordList {
		wordMap[w] = true
	}

	if !wordMap[endWord] {
		return 0
	}

	var queue []string
	queue = append(queue, beginWord)
	level := 1
	for len(queue) != 0 {
		levelSize := len(queue)
		for i := 0; i < levelSize; i++ {
			word := queue[0]
			queue = queue[1:]
			if word == endWord {
				return level
			}
			//寻找满足条件的word
			for c := 0; c < len(word); c++ {
				for j := 'a'; j <= 'z'; j++ {
					newWord := word[:c] + string(j) + word[c+1:]
					if wordMap[newWord] == true {
						queue = append(queue, newWord)
						wordMap[newWord] = false
					}
				}
			}
		}
		level++
	}
	return 0
}
