<?php

/**
 * 33. 搜索旋转排序数组
 * https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
 * 34. 在排序数组中查找元素的第一个和最后一个位置
 * https://leetcode-cn.com/problems/find-first-and-last-position-of-element-in-sorted-array/
 * 1603. 面试题53 - I. 在排序数组中查找数字 I
 * https://leetcode-cn.com/problems/zai-pai-xu-shu-zu-zhong-cha-zhao-shu-zi-lcof/
 *
 * Class SearchSolution
 *
 */
class SearchSolution
{

    /**
     * 二分法
     * @param $nums
     * @param $target
     * @return int
     */
    function search_33($nums, $target)
    {
        $start = 0;
        $end = count($nums) - 1;
        while ($nums[$start] > $nums[$end]) {
            $mid = intval($start + (($end - $start) / 2));
            if ($nums[$mid] >= $nums[$start]) {
                $target >= $nums[$start] && $target <= $nums[$mid] ? $end = $mid : $start = $mid + 1;
            } else {
                $target < $nums[$start] && $target >= $nums[$mid] ? $start = $mid : $end = $mid - 1;
            }
        }
        if ($start == $end) {
            return $nums[$start] == $target ? $start : -1;
        } else {
            return $this->helper_33($nums, $start, $end, $target);
        }
    }

    function helper_33($nums, $start, $end, $target)
    {
        while ($start < $end) {
            $mid = intval($start + (($end - $start) / 2));
            if ($target < $nums[$mid]) {
                $end = $mid;
            } else if ($target > $nums[$mid]) {
                $start = $mid + 1;
            } else {
                return $mid;
            }
        }
        return $start == $end && $target == $nums[$start] ? $start : -1;
    }

    /**
     * 二分法
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search_34_1603($nums, $target)
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

var_dump((new SearchSolution())->search_33([7,0,1,2,3,5], 6));