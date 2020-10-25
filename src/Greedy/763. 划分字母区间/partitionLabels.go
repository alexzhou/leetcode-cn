package main

import "fmt"

func partitionLabels(S string) []int {
	lastPos := [26]int{}
	var partition []int
	for i, c := range S {
		lastPos[c-'a'] = i //每个数字在字符中出现的最后一个位置
	}
	//遍历保存位置的map
	start, end := 0, 0 //切割位置的开始和结束
	for i, c := range S {
		if lastPos[c-'a'] > end {
			end = lastPos[c-'a'] //用字母出现的最后一个位置 来更新结束位置
		}
		//如果在i到达end之前  i<==>end之间的其他字母的位置更靠后的话 end 会被更新
		if i == end { //如果i 是 字母的最后位置 就可以切割了
			partition = append(partition, end-start+1)
			start = end + 1 //然后更新开始位置
		}

		fmt.Printf("i= %d end= %d \n", i, end)
	}
	return partition
}

func main() {
	S := "ababcbacabdefegdehijhklij"
	p := partitionLabels(S)
	fmt.Println(p)

}
