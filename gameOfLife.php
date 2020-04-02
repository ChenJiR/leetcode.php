<?php

/**
 * 289. 生命游戏
 * Class GameOfLifeSolution
 * https://leetcode-cn.com/problems/game-of-life/
 */
class GameOfLifeSolution
{

    /**
     * @param Integer[][] $board
     * @return NULL
     */
    function gameOfLife(&$board)
    {
        $change_item = [];
        foreach ($board as $y => $line) {
            foreach ($line as $x => $item) {
                $count_live_cell = substr_count(
                    ($board[$y - 1][$x - 1] ?: 0) .
                    ($board[$y - 1][$x] ?: 0) .
                    ($board[$y - 1][$x + 1] ?: 0) .
                    ($board[$y][$x + 1] ?: 0) .
                    ($board[$y + 1][$x + 1] ?: 0) .
                    ($board[$y + 1][$x] ?: 0) .
                    ($board[$y + 1][$x - 1] ?: 0) .
                    ($board[$y][$x - 1] ?: 0),
                    "1"
                );
                if ($item == 1) {
                    if ($count_live_cell < 2 || $count_live_cell > 3) {
                        $change_item[] = [$x, $y];
                    }
                } else {
                    if ($count_live_cell == 3) {
                        $change_item[] = [$x, $y];
                    }
                }
            }
        }

        foreach ($change_item as $xy) {
            list($X, $Y) = $xy;
            $board[$Y][$X] = $board[$Y][$X] ? "0" : "1";
        }
    }
}