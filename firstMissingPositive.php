<?php

/**
 * 41. 缺失的第一个正数
 * Class FirstMissingPositiveSolution
 * https://leetcode-cn.com/problems/first-missing-positive/
 */
class FirstMissingPositiveSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums)
    {
        $count = count($nums);
        for ($i = 0; $i < $count; $i++) {
            while ($nums[$i] > 0 && $nums[$i] <= $count && $nums[$nums[$i] - 1] != $nums[$i]) {
                list($nums[$nums[$i] - 1], $nums[$i]) = [$nums[$i], $nums[$nums[$i] - 1]];
            }
        }
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] != $i + 1) {
                return $i + 1;
            }
        }
        return $count + 1;
    }
}