<?php

/**
 * 15. 三数之和
 * Class ThreeSumSolution
 * https://leetcode-cn.com/problems/3sum/solution/
 */
class ThreeSumSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $res = [];
        sort($nums);
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($nums[$i - 1]) && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            $result = $this->twoSum($nums, $i + 1, -$nums[$i]);
            $res = array_merge($res, $result);
        }
        return $res;
    }

    function twoSum($nums, $start, $target)
    {
        $res = [];
        $end = count($nums) - 1;
        while ($start < $end) {
            $sum = $nums[$start] + $nums[$end];
            if ($sum == $target) {
                $res[] = [-$target, $nums[$start], $nums[$end]];
                while ($start < $end && $nums[$start] == $nums[$start + 1]) {
                    $start++;
                }
                while ($start < $end && $nums[$end] == $nums[$end - 1]) {
                    $end--;
                }
                $start++;
                $end--;
            } else if ($sum < $target) {
                $start++;
            } else {
                $end--;
            }
        }
        return $res;
    }
}