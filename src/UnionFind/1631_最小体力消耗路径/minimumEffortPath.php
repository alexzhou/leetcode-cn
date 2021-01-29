<?php
class UnionFind{
    protected $parent = [];
    protected $count;

    public function __construct($size)
    {
        $this->count = $size;
        for ($i=0;$i<$size;$i++){
            $this->parent[$i] = $i;
        }
    }

    public function getCount(){
        return $this->count;
    }

    public function find($i){
        while ($i!=$this->parent[$i]){
            $this->parent[$i] = $this->parent[$this->parent[$i]];
            $i = $this->parent[$i];
        }
        return $i;
    }

    public function union($x,$y){
        $x = $this->find($x);
        $y = $this->find($y);
        if($x!=$y){
            if($x >$y){
                $this->parent[$x] = $y;
            }else{
                $this->parent[$y] = $x;
            }
            $this->count--;
        }
    }

}
class Solution {

    /**
     * @param Integer[][] $heights
     * @return Integer
     */
    function minimumEffortPath($heights) {
        $rows = count($heights);
        $cols = count($heights[0]);
        $edgs = [];
        //生成节点
        for($i=0;$i<$rows;$i++){
            for ($j=0;$j<$cols;$j++){
                if($j==$cols-1 && $i<$rows-1){
                    $v = abs($heights[$i][$j] - $heights[$i+1][$j]);
                    $edgs[] = [$v,$i*$cols+$j,($i+1)*$cols+$j];
                }else if($i==$rows-1 && $j<$cols-1){
                    $v = abs($heights[$i][$j] - $heights[$i][$j+1]);
                    $edgs[] = [$v,$i*$cols+$j,$i*$cols+$j+1];
                }else if($j<$cols-1 && $i<$rows-1){
                    $v = abs($heights[$i][$j] - $heights[$i][$j+1]);
                    $edgs[] = [$v,$i*$cols+$j,$i*$cols+$j+1];
                    $v = abs($heights[$i][$j] - $heights[$i+1][$j]);
                    $edgs[] = [$v,$i*$cols+$j,($i+1)*$cols+$j];
                }
            }
        }
        //union
        usort($edgs,'static::compare');
        $end = $rows*$cols-1;
        $uf = new UnionFind($rows*$cols);
        $ans = 0;
        foreach ($edgs as $item){
            $uf->union($item[1],$item[2]);
            $ans  = max($ans,$item[0]);
            if($uf->find($end)==0){
                break;
            }
        }
        return $ans;
    }

    static function compare($a,$b){
        if($a[0]==$b[0]){
            return 0;
        }
        return $a[0] < $b[0]?-1:1;
    }
}

$obj = new Solution();
$obj->minimumEffortPath([[1,2,2],[3,8,2],[5,3,5]]);