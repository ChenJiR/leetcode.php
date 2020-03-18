<?php

/**
 * 1351. 统计有序矩阵中的负数
 * Class CountNegativesSolution
 * https://leetcode-cn.com/problems/count-negative-numbers-in-a-sorted-matrix/
 */
class CountNegativesSolution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countNegatives($grid)
    {
        $res = 0;
        $grid_count = count($grid);
        $need_column = count($grid[0]);
        foreach ($grid as $l => $line) {
            foreach ($line as $i => $item) {
                if($i >= $need_column){
                    break;
                }
                if ($item < 0) {
                    $res += ($need_column - $i) * $grid_count;
                    $need_column = $i;
                }
            }
            $grid_count--;
        }
        return $res;
    }
}