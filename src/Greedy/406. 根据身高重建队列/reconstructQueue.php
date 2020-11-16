<?php
class Solution {

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    function reconstructQueue($people) {
        $map = [];
        foreach($people as $item){
            $map[$item[0]][] = $item[1];//h=>[k1,k2,...]
        }
        krsort($map); //身高从高到低排列
        $ans = [];
        foreach($map as $key=>$list){
            sort($list); //同等身高位置从小到大排列
            $len = count($list);
            for ($i=0;$i<$len;$i++){ //因为前面的人都比要插入的高，所以看位置值是什么就插入到对应的位置
                $ans = $this->insert($ans,$list[$i],[$key,$list[$i]]);//$ans,k,[h,k]
            }
        }
        return $ans;
    }

    function insert($arr,$index,$item){
        $temp = array_slice($arr,0,$index);
        $temp[$index] = $item;
        $temp = array_merge($temp , array_slice($arr,$index));
        return $temp;
    }
}

$obj = new Solution();
$a = [[7,0],[7,1]];
$a = $obj->insert($a,1,[6,1]);
print_r($a);