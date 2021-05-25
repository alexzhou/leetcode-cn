package main

var inputs []byte
var root *AutocompleteSystem

type AutocompleteSystem struct {
	children    map[byte]*AutocompleteSystem
	times       int
	isSentences bool
}

func (this *AutocompleteSystem) Input(c byte) []string {
	if c == '#' {
		this.insert(string(inputs), 1)
		inputs = []byte{}
	} else {
		this.Search()
	}
}

func (this *AutocompleteSystem) insert(sentence string, time int) {
	length := len(sentence)
	curr := this
	for i := 0; i < length; i++ {
		char := sentence[i]

		if curr.children[char] == nil {
			newNode := &AutocompleteSystem{make(map[byte]*AutocompleteSystem, 0), time, false}
			curr.children[char] = newNode
		} else {
			curr.children[char].times += time
		}
		curr = curr.children[char]
	}
	curr.isSentences = true
}

func (this *AutocompleteSystem) search(c byte) {
	char := c
	if curr.children[char] == nil {
		newNode := &AutocompleteSystem{make(map[byte]*AutocompleteSystem, 0), time, false}
		curr.children[char] = newNode
	} else {
		curr.children[char].times += time
	}
	curr = curr.children[char]
}

func Constructor(sentences []string, times []int) AutocompleteSystem {
	root := AutocompleteSystem{make(map[byte]*AutocompleteSystem, 0), 0, false}

	for i, v := range sentences {
		root.insert(v, times[i])
	}
	return root

}

/**
 * Your AutocompleteSystem object will be instantiated and called as such:
 * obj := Constructor(sentences, times);
 * param_1 := obj.Input(c);
 */
