<?php

/**
 * 53. 最大子序和
 * 1548. 面试题42. 连续子数组的最大和
 * Class MaxSubArraySolution
 * https://leetcode-cn.com/problems/lian-xu-zi-shu-zu-de-zui-da-he-lcof/
 */
class MaxSubArraySolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $max = PHP_INT_MIN;
        $dp = 0;
        foreach ($nums as $item) {
            $dp = max($dp + $item, $item);
            $max = max($max, $dp);
        }
        return $max;
    }
}