<?php

/**
 * 1552. 面试题56 - II. 数组中数字出现的次数 II
 * Class SingleNumberSolution
 * https://leetcode-cn.com/problems/shu-zu-zhong-shu-zi-chu-xian-de-ci-shu-ii-lcof/
 */
class SingleNumberSolution
{

    /**
     * 非理想做法
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums)
    {
        sort($nums);
        $i = 0;
        while ($i <= count($nums) - 1) {
            if (!isset($nums[$i + 1])) {
                return $nums[$i];
            }
            if ($nums[$i] == $nums[$i + 1]) {
                $i += 3;
            } else {
                return $nums[$i];
            }
        }
    }
}