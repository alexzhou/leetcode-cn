<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $res = [];
        $this->backTrack2($nums,$res);
        return $res;
    }

    //DFS 太慢了
    function backTrack($nums,$subset,&$res){
        $sum = array_sum($subset);
        $len = count($subset);
        $key = $len.'_'.$sum;
        if(!isset($res[$key])){
            $res[$key] = $subset;
        }
        if(count($subset)==count($nums)){
            return;
        }
        $len = count($nums);
        for ($i=0;$i<$len;$i++){
            if(in_array($nums[$i],$subset)){
                continue;
            }
            $subset[] = $nums[$i];
            $this->backTrack($nums,$subset,$res);
            array_pop($subset);
        }
    }

    //二进制map
    function backTrack2($nums,&$res){
        $len = count($nums);
        $maxValue = pow(2,$len)-1;
        for($i=0;$i<=$maxValue;$i++){
            $str = decbin($i);
            $str = str_pad($str,$len,'0',STR_PAD_LEFT);
            echo $str.PHP_EOL;
            $subset = [];
            for ($j=0;$j<$len;$j++){
                if($str[$j]){
                    $subset[] = $nums[intval($j)];
                }
            }
            $res[] = $subset;
        }
    }

}

$obj = new Solution();
$result = $obj->subsets([1,2,3]);
print_r($result);