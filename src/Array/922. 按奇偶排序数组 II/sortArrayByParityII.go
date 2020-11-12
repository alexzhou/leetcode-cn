package _22__按奇偶排序数组_II
func sortArrayByParityII(A []int) []int {

	length:=len(A)
	odd:=make([]int, 0)
	even:=make([]int, 0)
	for i:=0;i<length;i++{
		if A[i]%2==0{
			even = append(even, A[i])
		}else{
			odd = append(odd, A[i])
		}

	}

	for i:=0;i<length;i++{
		if i%2==0{
			el:= len(even)
			A[i] = even[el-1]
			even = even[0:el-1]
		}else{
			ol:= len(odd)
			A[i] = odd[ol-1]
			odd = odd[0:ol-1]
		}
	}
	return A

}