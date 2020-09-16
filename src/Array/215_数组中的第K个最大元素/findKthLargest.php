<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $arr = SplFixedArray::fromArray($nums,false);
        $len = $arr->count();
        $this->quickSort($arr,0,$len-1);
        return $arr[$len-1-$k+1];
    }


    function findKthLargestV2($nums,$k){
        $len = count($nums);
        $heap = new SplMinHeap();
        for($i=0;$i < $len; $i++){
            if($heap->count() < $k){
                $heap->insert($nums[$i]);
            }else{
                if($heap->top() < $nums[$i]){
                    $heap->extract();
                    $heap->insert($nums[$i]);
                }
            }
        }
        return $heap->top();
    }

    //快排方法
    public function quickSort(&$a, $lo, $hi){
        if ($hi <= $lo) return;
        $j = $this->partition($a, $lo, $hi);
        $this->quickSort($a, $lo, $j-1);
        $this->quickSort($a, $j+1, $hi);
    }

    public function partition(&$a, $lo, $hi){
        $l= $lo;
        $r = $hi+1;
        $v = $a[$lo]; //用第一个当分割点
        while (1){
            while ($a[++$l] < $v){
                if($l===$hi)break;
            }
            while ($a[--$r] > $v){
                if($r===$lo)break;
            }
            if ($l >= $r) break; //break 要写在交换前面
            $temp = $a[$l];
            $a[$l] = $a[$r];
            $a[$r] = $temp;
        }
        //这个时候分割点还在lo位 移动到中间
        $a[$lo] = $a[$r];
        $a[$r] = $v;
        return $r;
    }
}

$obj = new Solution();
echo $obj->findKthLargest([3,2,1,5,6,4],1);