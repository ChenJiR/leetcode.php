<?php

/**
 * 11. 盛最多水的容器
 * Class MaxAreaSolution
 * https://leetcode-cn.com/problems/container-with-most-water/
 */
class MaxAreaSolution
{

    /**
     * 暴力法 超时解
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $max = 0;
        foreach ($height as $i => $h) {
            if ($i + 1 > count($height)) {
                break;
            }
            for ($i2 = $i + 1; $i2 < count($height); $i2++) {
                $max = max($max, ($i2 - $i) * min($height[$i2], $h));
            }
        }
        return $max;
    }

    /**
     * 双指针
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea2($height)
    {
        $max = 0;
        $left = 0;
        $right = count($height) - 1;
        while ($left < $right) {
            $w = $right - $left;
            $h = $height[$left] >= $height[$right] ? $height[$right--] : $height[$left++];
            $max = max($max, $w * $h);
        }
        return $max;
    }
}

var_dump((new MaxAreaSolution())->maxArea2([1, 8, 6, 2, 5, 4, 8, 3, 7]));