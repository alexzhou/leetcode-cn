package main

import "fmt"

func searchMatrix(matrix [][]int, target int) bool {
	var rows int = len(matrix)
	if rows == 0 {
		return false
	}
	var cols int = len(matrix[0])
	if cols == 0 {
		return false
	}
	var i int = rows - 1
	var j int = 0
	for i >= 0 && j <= cols-1 {
		if matrix[i][j] > target {
			i--
		} else if matrix[i][j] < target {
			j++
		} else {
			return true
		}

	}
	return false
}
func main() {
	var matrix [][]int = [][]int{
		{1, 4, 7, 11, 15},
		{2, 5, 8, 12, 19},
		{3, 6, 9, 16, 22},
		{10, 13, 14, 17, 24},
		{18, 21, 23, 26, 30},
	}
	fmt.Println(searchMatrix(matrix, 20))
}
