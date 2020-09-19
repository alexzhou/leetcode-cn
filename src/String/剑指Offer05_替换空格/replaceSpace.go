package main

import (
	"bytes"
	"fmt"
)

func replaceSpace(s string) string {
	length := len(s)
	if length == 0 {
		return ""
	}
	var result bytes.Buffer
	for i := 0; i < length; i++ {
		if s[i] == ' ' {
			result.WriteString("%20")
		} else {
			result.WriteRune(rune(s[i]))
		}

	}
	return result.String()
}
func main() {
	s := "We are happy."
	fmt.Println(replaceSpace(s))
}
