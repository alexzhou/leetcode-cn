<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        $len = count($nums);
        $i=$len-2;
        while ($i>=0 && $nums[$i] >= $nums[$i+1]){
            $i--;
        }
        if($i>=0){
            $j=$len-1;
            while($j>=0 &&  $nums[$i] >= $nums[$j] ){
                $j--;
            }
            echo "i = $i j= $j";
            if($j<0)$j = $len+$j;
            $temp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $temp;
            //print_r($nums);
        }

        $this->reverse($nums,$i+1,$len);

    }
    public function reverse(&$nums,$i,$len){
        $j = $len-1;
        while($i<$j){
            $tmp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $tmp;
            $i++;
            $j--;
        }
    }
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
$input = [1,3,2];
$obj->nextPermutation($input);
print_r($input).PHP_EOL;