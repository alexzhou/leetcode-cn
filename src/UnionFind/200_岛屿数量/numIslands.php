<?php
class UnionFind{
    private $fa = [];
    private $count;
    public function __construct($size)
    {
        $this->count = $size;
        for ($i=0;$i<$size;$i++){
            $this->fa[$i] = $i;
        }
    }
    public function getCount(){
        return $this->count;
    }
    function find($x){
        if($x!=$this->fa[$x]){
            $this->fa[$x] = $this->find($this->fa[$x]);
        }
        return $this->fa[$x];
    }
    function union($x,$y){
        $x = $this->find($x);
        $y = $this->find($y);
        if($x!=$y){
            $this->fa[$y] = $x;
            $this->count--;
        }
    }
}
class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $n = count($grid);
        $m = count($grid[0]);
        $edges = [];
        $map = [];
        $count = 0;
        for ($i=0;$i<$n;$i++){
            for ($j=0;$j<$m;$j++){
                if($grid[$i][$j]=='1'){
                    $num = $i*$m+$j;
                    if($j+1 < $m && $grid[$i][$j+1]=='1'){
                        $edges[] = [$num,$num+1];
                        if(!isset($map[$num])){
                            $map[$num] = $count;
                            $count+=1;
                        }
                        if(!isset($map[$num+1])){
                            $map[$num+1] = $count;
                            $count+=1;
                        }
                    }
                    if($i+1 < $n && $grid[$i+1][$j]=='1'){
                        $edges[] = [$num,($i+1)*$m+$j];
                        if(!isset($map[$num])){
                            $map[$num] = $count;
                            $count+=1;
                        }
                        if(!isset($map[($i+1)*$m+$j])){
                            $map[($i+1)*$m+$j] = $count;
                            $count+=1;
                        }
                    }
                    $edges[] = [$num,$num];
                    if(!isset($map[$num])){
                        $map[$num] = $count;
                        $count+=1;
                    }
                }
            }
        }
        $uf = new UnionFind(count($map));
        foreach ($edges as $e){
            $x = $map[$e[0]];
            $y = $map[$e[1]];
            $uf->union($x,$y);
        }
        return $uf->getCount();
    }
}
$obj = new Solution();
$arr =[
    ["1"]
];
echo $obj->numIslands($arr);
echo PHP_EOL;
