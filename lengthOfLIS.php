<?php

/**
 * 300. 最长上升子序列
 * Class LengthOfLISSolution
 * https://leetcode-cn.com/problems/longest-increasing-subsequence/
 */
class LengthOfLISSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        $dp = [];
        foreach ($nums as $i => $item) {
            $dp[$i] = 1;
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }
        return max($dp);
    }
}