<?php

/**
 * 59. 螺旋矩阵 II
 * Class GenerateMatrixSolution
 * https://leetcode-cn.com/problems/spiral-matrix-ii/
 */
class GenerateMatrixSolution
{

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n)
    {
        $top = $left = 0;
        $right = $buttom = $n - 1;
        $res = [];
        for ($i = 1; $i <= $n; $i++) {
            $res[] = range(1, $n);
        }
        $index = 1;
        $max = $n * $n;
        while ($index <= $max) {
            for ($i = $left; $i <= $right; $i++) $res[$top][$i] = $index++;
            if ($index > $max) break;
            $top++;
            for ($i = $top; $i <= $buttom; $i++) $res[$i][$right] = $index++;
            if ($index > $max) break;
            $right--;
            for ($i = $right; $i >= $left; $i--) $res[$buttom][$i] = $index++;
            if ($index > $max) break;
            $buttom--;
            for ($i = $buttom; $i >= $top; $i--) $res[$i][$left] = $index++;
            if ($index > $max) break;
            $left++;
        }
        return $res;
    }
}