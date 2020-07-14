<?php

/**
 * 120. 三角形最小路径和
 * Class MinimumTotalSolution
 * https://leetcode-cn.com/problems/triangle/
 */
class MinimumTotalSolution
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        $dp = [[$triangle[0][0]]];
        for ($i = 1; $i < count($triangle); $i++) {
            $each_dp = [];
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $each_dp[] = min($dp[$i - 1][$j - 1] ?? PHP_INT_MAX, $dp[$i - 1][$j] ?? PHP_INT_MAX) + $triangle[$i][$j];
            }
            $dp[] = $each_dp;
        }
        return min(end($dp));
    }
}