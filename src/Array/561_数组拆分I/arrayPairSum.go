package main

func arrayPairSum(nums []int) int {
	n := len(nums)
	quickSort(nums, 0, n-1)
	sum := 0
	for i := 0; i < n; i++ {
		if i%2 == 0 {
			sum += nums[i]
		}
	}
	return sum
}
func partition(a []int, lo, hi int) int {
	pivot := a[hi]
	i := lo - 1
	for j := lo; j < hi; j++ {
		if a[j] < pivot {
			i++
			a[j], a[i] = a[i], a[j]
		}
	}
	a[i+1], a[hi] = a[hi], a[i+1]
	return i + 1
}
func quickSort(a []int, lo, hi int) {
	if lo >= hi {
		return
	}
	p := partition(a, lo, hi)
	quickSort(a, lo, p-1)
	quickSort(a, p+1, hi)
}
