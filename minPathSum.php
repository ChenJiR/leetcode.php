<?php

/**
 * 64. 最小路径和
 * Class MinPathSumSolution
 * https://leetcode-cn.com/problems/minimum-path-sum/
 */
class MinPathSumSolution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid)
    {
        if (count($grid) == 0) return null;
        $dp = [];
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $item) {
                $dp[$i][$j] =
                    $i == 0 && $j == 0
                        ? $item
                        : min(
                            $dp[$i - 1][$j] ?? PHP_INT_MAX,
                            $dp[$i][$j - 1] ?? PHP_INT_MAX
                        ) + $item;
            }
        }
        return $dp[$i][$j];
    }
}