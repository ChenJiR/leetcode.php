<?php

/**
 * 1418. 面试题 01.07. 旋转矩阵
 * Class RotateSolution
 * https://leetcode-cn.com/problems/rotate-matrix-lcci/
 */
class RotateSolution
{

    /**
     * 由外至内每层翻转
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $count = count($matrix);
        $left = 0;
        $right = $count - 1;
        while ($left < $right) {
            for ($i = $left; $i < $right; $i++) {
                list($matrix[$left][$i], $matrix[$i][$right]) = [$matrix[$i][$right], $matrix[$left][$i]];
                list($matrix[$left][$i], $matrix[$right][$count - $i - 1]) = [$matrix[$right][$count - $i - 1], $matrix[$left][$i]];
                list($matrix[$left][$i], $matrix[$count - $i - 1][$left]) = [$matrix[$count - $i - 1][$left], $matrix[$left][$i]];
            }
            $left++;
            $right--;
        }
    }
}