<?php

/**
 * 918. 环形子数组的最大和
 * Class MaxSubarraySumCircularSolution
 * https://leetcode-cn.com/problems/maximum-sum-circular-subarray/
 */
class MaxSubarraySumCircularSolution
{

    /**
     * 暴力法 超时解
     * @param Integer[] $A
     * @return Integer
     */
    function maxSubarraySumCircular($A)
    {
        $tmp = array_merge($A, $A);
        $max = PHP_INT_MIN;
        for ($left = 0; $left < count($A); $left++) {
            $tmp_sum = $tmp[$left];
            $max = max($max, $tmp_sum);
            for ($right = $left + 1; $right < $left + count($A); $right++) {
                $tmp_sum += $tmp[$right];
                $max = $tmp[$right] <= 0 ? $max : max($max, $tmp_sum);
            }
        }
        return $max;
    }

    /**
     * 暴力法优化
     * @param Integer[] $A
     * @return Integer
     */
    function maxSubarraySumCircular2($A)
    {
        $tmp = [0];
        $sum = 0;
        $n = count($A);
        for ($i = 0; $i < $n * 2; $i++) {
            $sum += $A[$i % $n];
            $tmp[] = $sum;
        }
        $max = PHP_INT_MIN;
        $deque = [0];
        for ($right = 1; $right <= 2 * $n; $right++) {
            if ($deque[0] < $right - $n) {
                array_shift($deque);
            }
            $max = max($max, $tmp[$right] - $tmp[$deque[0]]);
            while (!empty($deque) && $tmp[$right] <= $tmp[end($deque)]) {
                array_pop($deque);
            }
            $deque[] = $right;
        }
        return $max;
    }
}


var_dump((new MaxSubarraySumCircularSolution)->maxSubarraySumCircular2([-2,-3,-1]));