package main

import "fmt"

func maxSlidingWindow(nums []int, k int) []int {
	var ans []int
	l := len(nums)
	type Item struct {
		val   int
		index int
	}
	queue := make([]*Item, 0)
	for i := 0; i < l; i++ {

		for len(queue) > 0 && queue[len(queue)-1].val <= nums[i] {
			queue = queue[:len(queue)-1]
		}
		queue = append(queue, &Item{nums[i], i})

		for queue[0].index < i-k+1 {
			queue = queue[1:]
		}

		if i >= k-1 {
			ans = append(ans, queue[0].val)
		}
	}

	return ans
}

func maxSlidingWindow2(nums []int, k int) []int {
	q := []int{}
	push := func(i int) {
		for len(q) > 0 && nums[i] >= nums[q[len(q)-1]] {
			q = q[:len(q)-1]
		}
		q = append(q, i)
	}

	for i := 0; i < k; i++ {
		push(i)
	}

	n := len(nums)
	ans := make([]int, 1, n-k+1)
	ans[0] = nums[q[0]]
	for i := k; i < n; i++ {
		push(i)
		for q[0] <= i-k {
			q = q[1:]
		}
		ans = append(ans, nums[q[0]])
	}
	return ans
}

func main() {
	var list = []int{1, 3, -1, -3, 5, 3, 6, 7}
	k := 3
	ans := maxSlidingWindow(list, k)
	fmt.Println(ans)
}
