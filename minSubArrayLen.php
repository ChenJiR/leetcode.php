<?php

/**
 * 209. 长度最小的子数组
 * Class MinSubArrayLenSolution
 * https://leetcode-cn.com/problems/minimum-size-subarray-sum/
 */
class MinSubArrayLenSolution
{

    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums)
    {
        $res = PHP_INT_MAX;
        $slow = $fast = $sum = 0;
        while ($fast < count($nums)) {
            $sum += $nums[$fast];
            while ($slow <= $fast && $sum >= $s) {
                $res = min($res, $fast - $slow + 1);
                $sum -= $nums[$slow++];
            }
            $fast++;
        }
        return $res == PHP_INT_MAX ? 0 : $res;
    }
}