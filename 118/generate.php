<?php
class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if($numRows==0)return [];
        $data = [];
        $data[1] = [1];
        for($i=2;$i<=$numRows;$i++){
            $preRow = $data[$i-1];
            $temp = [];
            $temp[0] = $preRow[0];
            for ($j=1;$j<$i-1;$j++){
                $temp[$j] = $preRow[$j-1]+$preRow[$j];
            }
            $temp[$i-1] = $preRow[count($preRow)-1];
            $data[$i] = $temp;
        }
        return $data;
    }
}

$obj = new Solution();
$numRows = 5;
$result = $obj->generate($numRows);
print_r($result);