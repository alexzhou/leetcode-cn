<?php
class UnionFind{
    protected $parent = [];
    protected $count;
    public $list = [];

    public function __construct($size)
    {
        $this->count = $size;
        for ($i=1;$i<=$size;$i++){
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

    public function union($item){
        $x = $item[1];
        $y = $item[2];
        $x = $this->find($x);
        $y = $this->find($y);
        if($x!=$y){
            $this->parent[$y] = $x;
            $this->count--;
        }else{
            $key = $item[0].'--'.$item[1].'--'.$item[2];
            $this->list[$key] = $key;
        }
    }

}
class Solution {
    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function maxNumEdgesToRemove($n, $edges) {
        $a = new UnionFind($n);
        $b = new UnionFind($n);
        usort($edges,"static::compare");
        foreach ($edges as $item){
            if($item[0]==3 || $item[0]==1){
                $a->union($item);
            }
            if($item[0]==3 || $item[0]==2){
                $b->union($item);
            }
        }
        if($a->getCount() >1 || $b->getCount()>1){
            return -1;
        }
        foreach ($a->list as $k=>$v){
            $b->list[$k] = $v;
        }
        return count($b->list);
    }
    //big to small
    static function compare($a,$b){
        if($a[0]==$b[0]){
            return 0;
        }
        return ($a[0] < $b[0])?1:-1;
    }
}
$obj = new Solution();
$ans = $obj->maxNumEdgesToRemove(2,[[1,1,2],[2,1,2],[3,1,2]]);
echo $ans.PHP_EOL;