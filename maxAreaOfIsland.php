<?php

/**
 * 695. 岛屿的最大面积
 * Class MaxAreaOfIslandSolution
 * https://leetcode-cn.com/problems/max-area-of-island/
 */
class MaxAreaOfIslandSolution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $land = [];
        $max_area = 0;
        foreach ($grid as $line_n => $line) {
            foreach ($line as $column_n => $i) {
                $land_sign = $line_n . "|" . $column_n;
                if ($i == 1 && !in_array($land_sign, $land)) {
                    $island = $this->searchArea($grid, $line_n, $column_n, []);
                    $max_area = max(count($island), $max_area);
                    $land = $land + $island;
                }
            }
        }
        return $max_area;
    }

    function searchArea($grid, $line_n, $column_n, $already_search)
    {
        $already_search[] = $line_n . "|" . $column_n;
        if (
            isset($grid[$line_n - 1][$column_n]) &&
            $grid[$line_n - 1][$column_n] == 1 &&
            !in_array(($line_n - 1) . "|" . $column_n, $already_search)
        ) {
            $already_search = $this->searchArea($grid, $line_n - 1, $column_n, $already_search);
        }
        if (
            isset($grid[$line_n][$column_n - 1]) &&
            $grid[$line_n][$column_n - 1] == 1 &&
            !in_array($line_n . "|" . ($column_n - 1), $already_search)
        ) {
            $already_search = $this->searchArea($grid, $line_n, $column_n - 1, $already_search);
        }
        if (
            isset($grid[$line_n + 1][$column_n]) &&
            $grid[$line_n + 1][$column_n] == 1 &&
            !in_array(($line_n + 1) . "|" . $column_n, $already_search)
        ) {
            $already_search = $this->searchArea($grid, $line_n + 1, $column_n, $already_search);
        }
        if (
            isset($grid[$line_n][$column_n + 1]) &&
            $grid[$line_n][$column_n + 1] == 1 &&
            !in_array($line_n . "|" . ($column_n + 1), $already_search)
        ) {
            $already_search = $this->searchArea($grid, $line_n, $column_n + 1, $already_search);
        }
        return $already_search;
    }
}

var_dump((new MaxAreaOfIslandSolution())->maxAreaOfIsland([[1,1,0,0,0],[1,1,0,0,0],[0,0,0,1,1],[0,0,0,1,1]]));