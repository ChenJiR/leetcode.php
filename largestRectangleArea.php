<?php

/**
 * 84. 柱状图中最大的矩形
 * Class LargestRectangleAreaSolution
 * https://leetcode-cn.com/problems/largest-rectangle-in-histogram/
 */
class LargestRectangleAreaSolution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights)
    {
        $count = count($heights);
        $left = $right = [];

        $stack = [];
        for ($i = 0; $i < count($heights); $i++) {
            while (!empty($stack) && $heights[end($stack)] >= $heights[$i]) {
                array_pop($stack);
            }
            $left[$i] = empty($stack) ? -1 : end($stack);
            $stack[] = $i;
        }
        $stack = [];
        for ($i = $count - 1; $i >= 0; $i--) {
            while (!empty($stack) && $heights[end($stack)] >= $heights[$i]) {
                array_pop($stack);
            }
            $right[$i] = empty($stack) ? $count : end($stack);
            $stack[] = $i;
        }
        $max = 0;
        foreach ($heights as $i => $item) {
            $max = max($max, ($right[$i] - $left[$i] - 1) * $item);
        }
        return $max;
    }
}