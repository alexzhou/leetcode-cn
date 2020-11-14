package _122__数组的相对排序

import "sort"

func relativeSortArray(arr1 []int, arr2 []int) []int {
	l1 := len(arr1)
	l2 := len(arr2)
	sort.Ints(arr1)
	var ans []int
	for j := 0; j < l2; j++ {
		for i := 0; i < l1; i++ {
			if arr2[j] == arr1[i] {
				ans = append(ans, arr1[i])
				arr1[i] = 1001
			}
		}
	}
	for i := 0; i < l1; i++ {
		if arr1[i] < 1001 {
			ans = append(ans, arr1[i])
		}
	}

	return ans
}
