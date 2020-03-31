<?php

/**
 * 912. 排序数组
 * Class SortArraySolution
 * https://leetcode-cn.com/problems/sort-an-array/
 */
class SortArraySolution
{

    /**
     * 冒泡
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums)
    {
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($nums[$i] > $nums[$j]) {
                    list($nums[$i], $nums[$j]) = [$nums[$j], $nums[$i]];
                }
            }
        }
        return $nums;
    }

    /**
     * 快排
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray2($nums)
    {
        if (count($nums) <= 1) return $nums;
        $left = [];
        $right = [];
        $middle = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            $nums[$i] <= $middle && $left[] = $nums[$i];
            $nums[$i] > $middle && $right[] = $nums[$i];
        }
        return array_merge($this->sortArray2($left), [$middle], $this->sortArray2($right));
    }
}