<?php

/**
 * 1666. 面试题 16.11. 跳水板
 * Class DivingBoardSolution
 * https://leetcode-cn.com/problems/diving-board-lcci/
 */
class DivingBoardSolution
{

    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    function divingBoard($shorter, $longer, $k)
    {
        if ($k == 0) return [];
        $all_short = $shorter * $k;
        $res = [$all_short];
        $tmp = $longer - $shorter;
        if ($tmp == 0) return $res;
        for ($i = 1; $i <= $k; $i++) {
            $res[] = $all_short += $tmp;
        }
        return $res;
    }
}