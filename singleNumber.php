<?php

/**
 * 1552. 面试题56 - II. 数组中数字出现的次数 II
 * 1608. 面试题56 - I. 数组中数字出现的次数
 *
 * 理想做法为位运算
 *
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

    /**
     * 1560解法 排序后解 非理想做法
     * @param $nums
     * @return array
     */
    function singleNumbers2($nums)
    {
        $res = [];
        sort($nums);
        $i = 0;
        while ($i <= count($nums) - 1) {
            if ($nums[$i] == $nums[$i + 1]) {
                $i += 2;
            } else {
                $res[] = $nums[$i];
                $i++;
            }
        }
        return $res;
    }

    /**
     * 位运算
     * @param $nums
     * @return array
     */
    function singleNumbers_1608($nums)
    {
        $x = 0;
        foreach ($nums as $n) $x ^= $n;
        $k = $x & (-$x);
        $a = $b = 0;
        foreach ($nums as $n) $n & $k ? $a ^= $n : $b ^= $n;
        return [$a, $b];
    }
}