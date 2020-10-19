package main

import (
	"bytes"
	"fmt"
)

//stack 应用
func backspaceCompare(S string, T string) bool {
	sLen := len(S)
	tLen := len(T)
	var newS []uint8
	var newT []uint8
	for i := 0; i < sLen; i++ {
		n := len(newS) - 1
		if S[i] == '#' {
			if n >= 0 {
				newS = newS[:n]
			}
		} else {
			newS = append(newS, S[i])
		}
	}
	for j := 0; j < tLen; j++ {
		n := len(newT) - 1
		if T[j] == '#' {
			if n >= 0 {
				newT = newT[:n]
			}
		} else {
			newT = append(newT, T[j])
		}
	}

	res := bytes.Equal(newS, newT)
	return res
}
func backspaceCompare2(S string, T string) bool {

	s := len(S) - 1
	t := len(T) - 1
	countS := 0
	countT := 0
	for s >= 0 || t >= 0 {
		//找到没被#影响的字符

		for s >= 0 {
			if S[s] == '#' {
				countS += 1
				s -= 1
			} else if countS > 0 {
				s -= 1
				countS -= 1
			} else {
				break
			}
		}
		for t >= 0 {
			if T[t] == '#' {
				countT += 1
				t -= 1
			} else if countT > 0 {
				t -= 1
				countT -= 1
			} else {
				break
			}
		}
		//开始比较
		if s >= 0 && t >= 0 && S[s] != T[t] {
			return false
		}
		if (s >= 0) != (t >= 0) {
			return false
		}
		s -= 1
		t -= 1

	}
	return true
}

//倒序比较

func main() {

	S := "bxj##tw"
	T := "bxj###tw"
	fmt.Println(backspaceCompare2(S, T))
}
