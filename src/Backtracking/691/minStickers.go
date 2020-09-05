package main

import (
	"bytes"
	"fmt"
	"math"
	"strconv"
)

func minStickers(stickers []string, target string) int {
	var list [][]string
	listLen := len(list)
	for i:=0;i< listLen;i++{

	}
	return 0
}

func subsets(str string) []string{
	var res []string
	length := len(str)
	maxValue := math.Exp2(float64(length))-1
	for i :=0;i<= int(maxValue);i++{
		i64 := int64(i)
		bstr := strconv.FormatInt(i64, 2)
		format := "%0"+strconv.Itoa(length)+"d"
		bstr = fmt.Sprintf(format, bstr)
		fmt.Println(bstr)
		var b bytes.Buffer
		for j:=0;j<length;j++{
			fmt.Print(byte('1'))
			fmt.Println(bstr[j])
			if bstr[j]== byte('1') {
				b.WriteString(string(str[j]))
			}
		}
		res = append(res,b.String())
	}
	return res
}

func main() {
	fmt.Println(subsets("abc"))
}
