package _19_杨辉三角II

func getRow(rowIndex int) []int {
	if rowIndex+1 == 1 {
		return []int{1}
	}
	if rowIndex+1 == 2 {
		return []int{1, 1}
	}
	preRow := []int{1, 1}
	for i := 3; i <= rowIndex+1; i++ {
		temp := make([]int, i)
		temp[0] = 1
		temp[i-1] = 1
		for j := 1; j < i-1; j++ {
			temp[j] = preRow[j-1] + preRow[j]
		}
		preRow = temp
	}

	return preRow
}
