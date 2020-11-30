<?php
class MyMaxHeap extends SplMaxHeap {
    public function  compare( $value1, $value2 ) {
        return ( $value1['count'] - $value2['count'] );
    }
}
class Solution {

    /**
     * @param String $S
     * @return String
     */
    function reorganizeString($S) {
        $s = $S;
        $heap = new MyMaxHeap();
        $len = strlen($s);
        if ($len <= 1) {
            return $s;
        }
        $max = 0;
        for  ($i=0;$i<$len;$i++){
            if(isset($map[$s[$i]])){
                $map[$s[$i]]+=1;
            }else{
                $map[$s[$i]]=1;
            }
            if ($map[$s[$i]] > $max){
                $max = $map[$s[$i]];
            }
        }
        /**
         * 当 n 是偶数时，有 n/2 个偶数下标和 n/2 个奇数下标，因此每个字母的出现次数都不能超过 n/2 次，否则出现次数最多的字母一定会出现相邻。
         * 当 n 是奇数时，由于共有 (n+1)/2 个偶数下标，因此每个字母的出现次数都不能超过 (n+1)/2 次，否则出现次数最多的字母一定会出现相邻。
         */
        if ($max > floor(($len+1)/2)) {
            return "";
        }
        foreach ($map as $k=>$v){
            $heap->insert(['key'=>$k,'count'=>$v]);
        }

        $ans = '';
        while($heap->count() >= 2){
            $a = $heap->extract();
            $b = $heap->extract();

            $ans .= $a['key'];
            $ans .= $b['key'];
            echo $ans.PHP_EOL;
            $a['count']-=1;
            $b['count']-=1;
            if ($a['count']>0){
                $heap->insert($a);
            }
            if ($b['count']>0){
                $heap->insert($b);
            }
        }
        /**
         * 当 n 是奇数时，是否可能出现重构的字符串的最后两个字母相同的情况？如果最后一个字母在整个字符串中至少出现了 2 次，
         * 则在最后一次从最大堆取出两个字母时，该字母会先被选出，
         * 因此不会成为重构的字符串的倒数第二个字母，也不可能出现重构的字符串最后两个字母相同的情况。
         */
        if($heap->count()>0){
            $node = $heap->extract();
            $ans.=$node['key'];
        }

       return $ans;
    }
}
$obj = new Solution();
$s = "vvvlo";
echo $obj->reorganizeString($s);