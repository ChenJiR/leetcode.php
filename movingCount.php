<?php

/**
 * 1531. 面试题13. 机器人的运动范围
 * Class MovingCountSolution
 * https://leetcode-cn.com/problems/ji-qi-ren-de-yun-dong-fan-wei-lcof/
 */
class MovingCountSolution
{

    /**
     * BFS
     * @param Integer $m
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function movingCount($m, $n, $k)
    {
        $list = [[0, 0]];
        $total_list = ["0|0"];
        while (!empty($list)) {
            list($x, $y) = array_shift($list);
            $sum_x = array_sum(str_split($x));
            $sum_y = array_sum(str_split($y));
            if ($x + 1 < $n && array_sum(str_split($x + 1)) + $sum_y <= $k && !in_array(($x + 1) . "|$y", $total_list)) {
                $list[] = [$x + 1, $y];
                $total_list[] = ($x + 1) . "|$y";
            }
            if ($y + 1 < $m && array_sum(str_split($y + 1)) + $sum_x <= $k && !in_array("$x|" . ($y + 1), $total_list)) {
                $list[] = [$x, $y + 1];
                $total_list[] = "$x|" . ($y + 1);
            }
        }
        return count($total_list);
    }
}