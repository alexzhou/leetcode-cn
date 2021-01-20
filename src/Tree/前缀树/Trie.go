package main

type Trie struct {
	key      byte
	children map[byte]*Trie
	isWord   bool
}

/** Initialize your data structure here. */
func Constructor() Trie {
	return Trie{key: 0, children: make(map[byte]*Trie), isWord: false}
}

/** Inserts a word into the trie. */
func (this *Trie) Insert(word string) {
	wordLength := len(word)
	curr := this
	for i := 0; i < wordLength; i++ {
		char := word[i]
		if curr.children[char] == nil {
			newNode := &Trie{key: char, children: make(map[byte]*Trie), isWord: false}
			curr.children[char] = newNode
		}
		curr = curr.children[char]
	}
	curr.isWord = true
}

/** Returns if the word is in the trie. */
func (this *Trie) Search(word string) bool {
	keyLength := len(word)
	curr := this
	for i := 0; i < keyLength; i++ {
		char := word[i]
		if curr.children[char] == nil {
			return false
		} else {
			curr = curr.children[char]
		}
	}
	return curr.isWord
}

/** Returns if there is any word in the trie that starts with the given prefix. */
func (this *Trie) StartsWith(prefix string) bool {
	keyLength := len(prefix)
	curr := this
	for i := 0; i < keyLength; i++ {
		char := prefix[i]
		if curr.children[char] == nil {
			return false
		} else {
			curr = curr.children[char]
		}
	}
	return true
}

/**
 * Your Trie object will be instantiated and called as such:
 * obj := Constructor();
 * obj.Insert(word);
 * param_2 := obj.Search(word);
 * param_3 := obj.StartsWith(prefix);
 */
