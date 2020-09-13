<?php

/**
 * 79. 单词搜索
 * Class ExistSolution
 * https://leetcode-cn.com/problems/word-search/
 */
class ExistSolution
{

    protected $row = 0;
    protected $col = 0;

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        $row = count($board);
        $col = count($board[0]);
        $this->row = $row;
        $this->col = $col;
        $visited = array_fill(0, $row, array_fill(0, $col, 0));
        $len_w = strlen($word);
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($board[$i][$j] == $word[0]) {
                    if ($this->dfs($i, $j, $board, $visited, $word, 0, $len_w)) {
                        return true;
                    } else {
                        //echo "2222";
                        continue;
                    }
                }
            }
        }

        return false;
    }

    protected function dfs($i, $j, &$board, $visited, &$word, $index, &$len_w)
    {
        if ($i < $this->row && $i >= 0 && $j < $this->col && $j >= 0 && $visited[$i][$j] == 0 && $board[$i][$j] == $word[$index]) {
            $visited[$i][$j] = 1;
            //echo $word[$index].$i.':'.$j.PHP_EOL;
            $index++;
        } else {
            return false;
        }
        if ($index == $len_w) {
            return true;
        }

        return
            $this->dfs($i + 1, $j, $board, $visited, $word, $index, $len_w) ||
            $this->dfs($i - 1, $j, $board, $visited, $word, $index, $len_w) ||
            $this->dfs($i, $j + 1, $board, $visited, $word, $index, $len_w) ||
            $this->dfs($i, $j - 1, $board, $visited, $word, $index, $len_w);
    }
}