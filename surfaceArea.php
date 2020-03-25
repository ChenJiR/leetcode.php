<?php

/**
 * 892. 三维形体的表面积
 * Class SurfaceAreaSolution
 * https://leetcode-cn.com/problems/surface-area-of-3d-shapes/
 */
class SurfaceAreaSolution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function surfaceArea($grid)
    {
        $res = 0;
        foreach ($grid as $i => $line) {
            foreach ($line as $j => $item) {
                if ($item == 0) {
                    continue;
                }
                $res += 2 + (4 * $item);
                if (isset($grid[$i - 1][$j])) {
                    $res -= 2 * min($item, $grid[$i - 1][$j]);
                }
                if (isset($grid[$i][$j - 1])) {
                    $res -= 2 * min($item, $grid[$i][$j - 1]);
                }
            }
        }
        return $res;
    }
}