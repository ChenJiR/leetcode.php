<?php

/**
 * 529. 扫雷游戏
 * Class UpdateBoardSolution
 * https://leetcode-cn.com/problems/minesweeper/
 */
class UpdateBoardSolution
{

    /**
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    function updateBoard($board, $click)
    {
        list($y, $x) = $click;
        $click_square = $board[$y][$x];
        if ($click_square == 'M') {
            $board[$y][$x] = 'X';
        } else {
            $board = $this->dfs($board, $y, $x);
        }
        return $board;
    }

    function dfs($board, $y, $x)
    {
        $cnt = 0;
        isset($board[$y - 1][$x]) && $board[$y - 1][$x] == 'M' && $cnt++;
        isset($board[$y + 1][$x]) && $board[$y + 1][$x] == 'M' && $cnt++;
        isset($board[$y - 1][$x - 1]) && $board[$y - 1][$x - 1] == 'M' && $cnt++;
        isset($board[$y + 1][$x + 1]) && $board[$y + 1][$x + 1] == 'M' && $cnt++;
        isset($board[$y - 1][$x + 1]) && $board[$y - 1][$x + 1] == 'M' && $cnt++;
        isset($board[$y + 1][$x - 1]) && $board[$y + 1][$x - 1] == 'M' && $cnt++;
        isset($board[$y][$x + 1]) && $board[$y][$x + 1] == 'M' && $cnt++;
        isset($board[$y][$x - 1]) && $board[$y][$x - 1] == 'M' && $cnt++;
        if ($cnt > 0) {
            $board[$y][$x] = strval($cnt);
        } else {
            $board[$y][$x] = 'B';
            isset($board[$y - 1][$x]) && $board[$y - 1][$x] == 'E' && $board = $this->dfs($board, $y - 1, $x);
            isset($board[$y + 1][$x]) && $board[$y + 1][$x] == 'E' && $board = $this->dfs($board, $y + 1, $x);
            isset($board[$y - 1][$x - 1]) && $board[$y - 1][$x - 1] == 'E' && $board = $this->dfs($board, $y - 1, $x - 1);
            isset($board[$y + 1][$x + 1]) && $board[$y + 1][$x + 1] == 'E' && $board = $this->dfs($board, $y + 1, $x + 1);
            isset($board[$y - 1][$x + 1]) && $board[$y - 1][$x + 1] == 'E' && $board = $this->dfs($board, $y - 1, $x + 1);
            isset($board[$y + 1][$x - 1]) && $board[$y + 1][$x - 1] == 'E' && $board = $this->dfs($board, $y + 1, $x - 1);
            isset($board[$y][$x + 1]) && $board[$y][$x + 1] == 'E' && $board = $this->dfs($board, $y, $x + 1);
            isset($board[$y][$x - 1]) && $board[$y][$x - 1] == 'E' && $board = $this->dfs($board, $y, $x - 1);
        }
        return $board;
    }
}
