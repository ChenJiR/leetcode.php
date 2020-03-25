<?php

/**
 * 34. 在排序数组中查找元素的第一个和最后一个位置
 * 1559. 面试题53 - I. 在排序数组中查找数字 I
 * Class SearchSolution
 * https://leetcode-cn.com/problems/zai-pai-xu-shu-zu-zhong-cha-zhao-shu-zi-lcof/
 */
class SearchSolution
{

    /**
     * 二分法
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $tmp = intval(($start + $end) / 2);
            $nums[$tmp] <= $target ? $start = $tmp + 1 : $end = $tmp - 1;
        }
        $right = $start;
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $tmp = intval(($start + $end) / 2);
            $nums[$tmp] < $target ? $start = $tmp + 1 : $end = $tmp - 1;
        }
        $left = $end;
        return $right - $left - 1;
    }
}