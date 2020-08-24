<?php
class Solution {
    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $result = [];
        for($i=0;$i<$n;$i++){
            $board[] = str_pad('',$n,'.');
        }
        //print_r($board);
        $this->backTrack($board,0,$result);
        return $result;
    }

    /**
     * @param array $track
     * @param int $n
     * @param array $result
     */
    function backTrack($board,$row,&$res) {
        // 触发结束条件
        if ($row == count($board)) {
            array_push($res,$board);
            return;
        }

        $n = strlen($board[$row]);
        for ($col = 0; $col < $n; $col++) {
            // 排除不合法选择
            if (!$this->isValid($board, $row, $col)){
                continue;
            }
            // 做选择
            $board[$row][$col] = 'Q';
            // 进入下一行决策
            $this->backTrack($board, $row + 1,$res);
            // 撤销选择
            $board[$row][$col] = '.';
        }
    }

    function isValid($board,$row,$col){
        $n =count($board);
        // 检查列是否有皇后互相冲突
        for ($i = 0; $i < $n; $i++) {
            if ($board[$i][$col] == 'Q') return false;
        }
        // 检查右上方是否有皇后互相冲突
        for ($i = $row - 1, $j = $col + 1;$i >= 0 && $j < $n; $i--, $j++) {
            if ($board[$i][$j] == 'Q')return false;
        }
        // 检查左上方是否有皇后互相冲突
        for ($i = $row - 1, $j = $col - 1; $i>= 0 && $j >= 0; $i--, $j--) {
            if ($board[$i][$j] == 'Q') return false;
        }
        return true;
    }
}

$obj = new Solution();
$result = $obj->solveNQueens(8);
print_r($result);