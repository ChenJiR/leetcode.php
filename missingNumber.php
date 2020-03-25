<?php

/**
 * 1484. 面试题 17.04. 消失的数字
 * Class MissingNumberSolution
 * https://leetcode-cn.com/problems/missing-number-lcci/
 */
class MissingNumberSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $max = count($nums);
        return (($max * ($max + 1)) / 2) - array_sum($nums);
    }
}