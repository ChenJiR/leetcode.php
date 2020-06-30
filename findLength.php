<?php

/**
 * 718. 最长重复子数组
 * Class FindLengthSolution
 * https://leetcode-cn.com/problems/maximum-length-of-repeated-subarray/
 */
class FindLengthSolution
{

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer
     */
    function findLength($A, $B)
    {
        $dp = [];
        $n = count($A);
        $m = count($B);
        $res = 0;
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $m - 1; $j >= 0; $j--) {
                $dp[$i][$j] = $A[$i] == $B[$j] ? $dp[$i + 1][$j + 1] + 1 : 0;
                $res = max($res, $dp[$i][$j]);
            }
        }
        return $res;
    }
}