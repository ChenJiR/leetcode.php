<?php

/**
 * 287. 寻找重复数
 * Class FindDuplicateSolution
 * https://leetcode-cn.com/problems/find-the-duplicate-number/
 */
class FindDuplicateSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums)
    {
        $fast = $nums[$nums[0]];
        $slow = $nums[0];
        while ($slow != $fast) {
            $fast = $nums[$nums[$fast]];
            $slow = $nums[$slow];
        }
        $slow = 0;
        while ($slow != $fast) {
            $slow = $nums[$slow];
            $fast = $nums[$fast];
        }
        return $slow;
    }
}