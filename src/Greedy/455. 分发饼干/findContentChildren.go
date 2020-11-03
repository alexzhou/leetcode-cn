package _55__分发饼干

func findContentChildren(g []int, s []int) int {
	quickSort(&g, 0, len(g))
	quickSort(&s, 0, len(s))
	//TODO
	return 0
}

func quickSort(a *[]int, lo int, hi int) {
	if hi > lo {
		j := partition(a, lo, hi)
		quickSort(a, lo, j-1)
		quickSort(a, j+1, hi)
	}
}

func partition(a *[]int, lo int, hi int) int {

	l := lo
	r := hi + 1
	v := (*a)[lo]
	for true {
		for (*a)[l]< v {
			if l==hi {
			break
			}
		}
		for (*a)[--r] > v{
			if (r==lo){
			break
			}
		}
		if l>=r {
			break //break 要写在交换前面
		}
		temp := (*a)[l]
		(*a)[l] = (*a)[r]
		(*a)[r] = temp

	}
	//这个时候分割点还在lo位 移动到中间
	(*a)[lo] = (*a)[r]
	(*a)[r] = v

	return 0
}
