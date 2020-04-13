<?php

/**
 * 674. 最长连续递增序列
 * Class FindLengthOfLCISSolution
 * https://leetcode-cn.com/problems/longest-continuous-increasing-subsequence/
 */
class FindLengthOfLCISSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLengthOfLCIS($nums)
    {
        if (empty($nums)) return 0;
        $prev = $nums[0];
        $max = 1;
        $each = 1;
        for ($i = 1; $i < count($nums); $i++) {
            if ($prev < $nums[$i]) {
                $each++;
            } else {
                $max = max($max, $each);
                $each = 1;
            }
            $prev = $nums[$i];
        }
        return max($max, $each);
    }
}