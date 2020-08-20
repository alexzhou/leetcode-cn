package main

import (
	"fmt"
	"math"
)

func titleToNumber(s string) int {

	var len int = len(s)
	var result float64
	for i := len; i > 0; i-- {
		result += float64(s[i-1]-'A'+1) * math.Pow(26, float64(len-i))
	}
	return int(result)

}

func main() {
	fmt.Println(titleToNumber("A"))
}
