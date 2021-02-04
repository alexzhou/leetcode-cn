<?php

class DualHeap{
    public $small;
    public $large;
    public $delayed=[];

    public function __construct()
    {
        $this->small = new SplMaxHeap();
        $this->large = new SplMinHeap();
    }

    public function insert($num){
        if($this->small->count()){
            if($num <= $this->small->top()){
                $this->small->insert($num);
            }else{
                $this->large->insert($num);
            }
        }else{
            $this->small->insert($num);
        }
        $this->makeBalance();
    }

    private function makeBalance(){
        if($this->small->count()  - $this->large->count() >=2){
            $this->large->insert($this->small->extract());
            $this->prune($this->small);
        }
        if($this->small->count()  - $this->large->count()== -1){
            $this->small->insert($this->large->extract());
            $this->prune($this->large);
        }
    }

    public function erase($num){
        if(isset($this->delayed[$num])){
            $this->delayed[$num] +=1;
        }else{
            $this->delayed[$num] = 1;
        }
        if($num <= $this->small->top()){

        }
    }

    public function getMedian($num){

    }

    public function prune(SplHeap $heap){
        while ($heap->count()){
            $num = $heap->top();
            if(isset($this->delayed[$num])&&$this->delayed[$num]){
                $this->delayed[$num]--;
                if($this->delayed[$num]==0){
                    unset($this->delayed[$num]);
                }
                $heap->extract();
            }else{
                break;
            }
        }
    }
}


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float[]
     */
    function medianSlidingWindow($nums, $k) {
        $arr = [];
        $ans = [];
        foreach ($nums  as $val){
            if(count($arr) > 3){
                $arr = array_slice($arr,1);
            }
            $temp = $this->sortArr($arr);
            if($k%2==0){
                $ans[] = ($temp[floor($k/2)] + $temp[floor($k/2)+1])/2;
            }else{
                $ans[] = $temp[floor($k/2)];
            }
        }
        return $ans;
    }





}