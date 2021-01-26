<?php
class Solution {

    /**
     * @param Integer[][] $dominoes
     * @return Integer
     */
    function numEquivDominoPairs($dominoes) {
        $map = [];
        $count = 0;
        foreach ($dominoes as $pair){
            $v = $pair[0] > $pair[1] ? $pair[1]*10 +$pair[0] : $pair[0]*10 +$pair[1];
            if(isset($map[$v])){
                $count+=$map[$v];
                $map[$v]+=1;
            }else{
                $map[$v]=1;
            }
        }

        return $count;
    }
}