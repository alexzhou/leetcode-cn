<?php
class Solution {

    /**
     * @param Integer[][] $points
     * @param Integer $K
     * @return Integer[][]
     */
    function kClosest($points, $K) {
        $map = [];
        $heap = new SplMaxHeap();
        foreach($points as $pair){
            $d = $pair[0]*$pair[0] + $pair[1]*$pair[1];
            $heap->insert($d);
            $map[$d][] = $pair;
            if($heap->count() > $K){
                $key = $heap->extract();
                unset($map[$key]);
            }
        }
        $ans = [];
        while(!$heap->isEmpty()){
            $list =  $map[$heap->extract()];
            foreach($list as $item){
                if( count($ans)>=$K )break 2;
                $ans[] = $item;
            }

        }
        return $ans;
    }
}

$obj = new Solution();
$list = [[-95,76],[17,7],[-55,-58],[53,20],[-69,-8],[-57,87],[-2,-42],[-10,-87],[-36,-57],[97,-39],[97,49]];
$k = 5;
$result = $obj->kClosest($list,$k);
print_r(json_encode($result));