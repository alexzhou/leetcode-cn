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