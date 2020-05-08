<?php

/**
 * 221. 最大正方形
 * Class MaximalSquareSolution
 * https://leetcode-cn.com/problems/maximal-square/
 */
class MaximalSquareSolution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix)
    {
        $max = 0;
        for ($y = 0; $y < count($matrix); $y++) {
            for ($x = 0; $x < count($matrix[$y]); $x++) {
                if ($matrix[$y][$x] == 1) {
                    $matrix[$y][$x] = min(
                            $matrix[$y - 1][$x - 1] ?: 0,
                            $matrix[$y][$x - 1] ?: 0,
                            $matrix[$y - 1][$x] ?: 0
                        ) + 1;
                    $max = max($matrix[$y][$x], $max);
                }
            }
        }
        return $max * $max;
    }
}