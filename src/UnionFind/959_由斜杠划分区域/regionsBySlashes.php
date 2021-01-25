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
            $this->parent[$x] = $y;
            $this->count--;
        }
    }

}


class Solution {

    /**
     * @param String[] $grid
     * @return Integer
     */
    function regionsBySlashes($grid) {
        $N = count($grid);
        $size = 4*$N*$N;
        $uf = new UnionFind($size);
        for ($i=0;$i<$N;$i++){
            $row = $grid[$i];
            for ($j=0;$j<$N;$j++){
                $offset = 4*($i*$N+$j);
                $char = $row[$j];
                if($char=='/'){
                    $uf->union($offset,$offset+3);
                    $uf->union($offset+1,$offset+2);
                }else if($char=='\\'){
                    $uf->union($offset,$offset+1);
                    $uf->union($offset+2,$offset+3);
                }else{
                    $uf->union($offset,$offset+1);
                    $uf->union($offset+1,$offset+2);
                    $uf->union($offset+2,$offset+3);
                }
                if($j+1 <$N){
                    $uf->union($offset+1,4*($i*$N+$j+1)+3);
                }
                if($i+1 <$N){
                    $uf->union($offset+2,4*(($i+1)*$N+$j));
                }
            }
        }
        return $uf->getCount();
    }
}