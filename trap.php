<?php

/**
 * 42. 接雨水
 * Class TrapSolution
 * https://leetcode-cn.com/problems/trapping-rain-water/
 */
class TrapSolution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $total_h = $height[0];
        $total_trap = 0;
        $left = 0;
        $tmp = [$height[0]];
        for ($right = 1; $right < count($height); $right++) {
            $h = $height[$right];
            $total_h += $h;
            if ($h >= $height[$left]) {
                $total_trap += ($right - $left) * $height[$left];
                $left = $right;
                $tmp = [$h];
            } else {
                $tmp[] = $h;
            }
        }

        $tmp_max = 0;
        for ($j = count($tmp) - 1; $j >= 0; $j--) {
            $tmp_max = max($tmp_max, $tmp[$j]);
            $tmp[$j] = $tmp_max;
        }

        return $total_trap + array_sum($tmp) - $total_h;
    }
}