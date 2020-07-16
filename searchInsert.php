<?php

/**
 * 35. 搜索插入位置
 * Class SearchInsertSolution
 * https://leetcode-cn.com/problems/search-insert-position/
 */
class SearchInsertSolution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        foreach ($nums as $i => $item) {
            if ($item >= $target) {
                return $i;
            }
        }
        return count($nums);
    }

    /**
     * 二分
     * @param $nums
     * @param $target
     * @return int
     */
    function searchInsert2($nums, $target)
    {
        $left = 0;
        $right = count($nums) - 1;
        $res = count($nums);
        while ($left <= $right) {
            $mid = intval($left + (($right - $left) / 2));
            if ($target <= $nums[$mid]) {
                $res = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return $res;
    }
}