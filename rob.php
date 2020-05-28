<?php

/**
 * 198. 打家劫舍
 * Class RobSolution
 * https://leetcode-cn.com/problems/house-robber/
 */
class RobSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        if (empty($nums)) return 0;
        if (count($nums) < 2) return max($nums);
        $dp = [$nums[0], max($nums[0], $nums[1])];
        for ($i = 2; $i < count($nums); $i++) {
            $dp[$i] = max($dp[$i - 2] + $nums[$i], $dp[$i - 1]);
        }
        return $dp[count($nums) - 1];
    }
}