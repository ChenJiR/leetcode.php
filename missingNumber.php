<?php

/**
 * 1484. 面试题 17.04. 消失的数字
 * 1565. 面试题53 - II. 0～n-1中缺失的数字 (略有不同)
 * Class MissingNumberSolution
 * https://leetcode-cn.com/problems/missing-number-lcci/
 * https://leetcode-cn.com/problems/que-shi-de-shu-zi-lcof/
 */
class MissingNumberSolution
{

    /**
     * 直接使用高斯算法
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $max = count($nums);
        return (($max * ($max + 1)) / 2) - array_sum($nums);
    }

    /**
     * 1565 题二分法解法 ,因为有序所以可以采用此解法
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber2($nums)
    {
        $l = $nums[0];
        $h = count($nums) - 1;
        $m = intval(($l + $h) / 2);
        while ($l <= $h) {
            $m = intval(($l + $h) / 2);
            $nums[$m] == $m ? $l = $m + 1 : $h = $m - 1;
        }
        return $m;
    }
}