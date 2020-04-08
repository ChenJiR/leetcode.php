<?php


/**
 * 54. 螺旋矩阵
 * 1547. 面试题29. 顺时针打印矩阵
 * Class SpiralOrderSolution
 * https://leetcode-cn.com/problems/spiral-matrix/
 * https://leetcode-cn.com/problems/shun-shi-zhen-da-yin-ju-zhen-lcof/
 */
class SpiralOrderSolution
{

    /**
     * 模拟
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $go_right = 1;
        $go_left = 2;
        $go_up = 3;
        $go_down = 4;
        $x = $y = 0;
        $cur_opration = $go_right;
        $res = [];
        while (isset($matrix[$y][$x])) {
            $res[] = $matrix[$y][$x];
            $matrix[$y][$x] = null;
            switch ($cur_opration) {
                case $go_right:
                    if (isset($matrix[$y][$x + 1])) {
                        $x++;
                    } else {
                        $y++;
                        $cur_opration = $go_down;
                    }
                    break;
                case $go_down:
                    if (isset($matrix[$y + 1][$x])) {
                        $y++;
                    } else {
                        $x--;
                        $cur_opration = $go_left;
                    }
                    break;
                case $go_left:
                    if (isset($matrix[$y][$x - 1])) {
                        $x--;
                    } else {
                        $y--;
                        $cur_opration = $go_up;
                    }
                    break;
                case $go_up:
                    if (isset($matrix[$y - 1][$x])) {
                        $y--;
                    } else {
                        $x++;
                        $cur_opration = $go_right;
                    }
                    break;
            }
        }
        return $res;
    }

    /**
     * 模拟
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder2($matrix)
    {
        $res = [];
        if (empty($matrix)) {
            return $res;
        }
        $top = $left = 0;
        $right = count($matrix[0]) - 1;
        $bottom = count($matrix) - 1;
        while ($left <= $right && $top <= $bottom) {
            for ($i = $left; $i <= $right; $i++) {
                isset($matrix[$top][$i]) && $res[] = $matrix[$top][$i];
                $matrix[$top][$i] = null;
            }
            $top++;
            for ($i = $top; $i <= $bottom; $i++) {
                isset($matrix[$i][$right]) && $res[] = $matrix[$i][$right];
                $matrix[$i][$right] = null;
            }
            $right--;
            for ($i = $right; $i >= $left; $i--) {
                isset($matrix[$bottom][$i]) && $res[] = $matrix[$bottom][$i];
                $matrix[$bottom][$i] = null;
            }
            $bottom--;
            for ($i = $bottom; $i >= $top; $i--) {
                isset($matrix[$i][$left]) && $res[] = $matrix[$i][$left];
                $matrix[$i][$left] = null;
            }
            $left++;
        }
        return $res;
    }
}

var_dump((new SpiralOrderSolution())->spiralOrder2([[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]]));
