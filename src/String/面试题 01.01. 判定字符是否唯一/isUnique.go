package main

import (
	"fmt"
)

func isUnique(astr string) bool {
	var mp = make(map[uint8]int)
	l := len(astr)
	for i := 0; i < l; i++ {
		mp[astr[i]] += 1
		if mp[astr[i]] > 1 {
			return false
		}
	}
	return true
}

func main() {
	s := "abc"
	fmt.Printf("%s ==> %b\n", s, isUnique(s))
}
