<?php
class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $data = [];
        $data[1] = [1];
        for($i=2;$i<=$rowIndex+1;$i++){
            $preRow = $data[$i-1];
            $temp = [];
            $temp[0] = $preRow[0];
            for ($j=1;$j<$i-1;$j++){
                $temp[$j] = $preRow[$j-1]+$preRow[$j];
            }
            $temp[$i-1] = $preRow[count($preRow)-1];
            $data[$i] = $temp;
        }
        return $data[$rowIndex+1];
    }

    function getRow2($rowIndex) {
        if($rowIndex==0)return [1];
        $preRow = [1];
        for($i=2;$i<=$rowIndex+1;$i++){
            $temp = [];
            $temp[0] = $preRow[0];
            for ($j=1;$j<$i-1;$j++){
                $temp[$j] = $preRow[$j-1]+$preRow[$j];
            }
            $temp[$i-1] = $preRow[count($preRow)-1];
            $preRow = $temp;
        }
        return $preRow;
    }
}
$obj = new Solution();
$rowIndex = 3;
$result = $obj->getRow($rowIndex);
print_r($result);