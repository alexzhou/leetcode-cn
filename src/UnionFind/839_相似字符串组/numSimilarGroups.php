<?php
class UnionFind{
    public $fa = [];
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
     * @param String[] $strs
     * @return Integer
     */
    function numSimilarGroups($strs) {
        $len = count($strs);
        $uf = new UnionFind($len);
        for ($i=0;$i<$len;$i++){
            for ($j=$i+1;$j<$len;$j++){
                if($this->check($strs[$i],$strs[$j])){
                    $uf->union($i,$j);
                }
            }
        }
        return $uf->getCount();
    }
    function check($a,$b)
    {
        $num = 0;
        $len = strlen($a);
        for ($i=0;$i<$len;$i++){
            if($a[$i]!=$b[$i]){
                $num++;
                if($num >2){
                    return false;
                }
            }
        }
        return true;
    }
}

$obj = new Solution();
$ans = $obj->numSimilarGroups(["tars","rats","arts","star"]);
echo $ans.PHP_EOL;