package main

import "fmt"

func sortArrayByParityII(A []int) []int {
	for i, j := 0, 1; i < len(A); i += 2 {
		if A[i]%2 == 1 {
			for A[j]%2 == 1 {
				j += 2
			}
			A[i], A[j] = A[j], A[i]
		}
	}
	return A
}
func main(){
	a:=[]int{888,505,627,846}
	a = sortArrayByParityII(a)
	fmt.Println(a)
}