<?php

/**
 * 128. 最长连续序列
 * Class LongestConsecutiveSolution
 * https://leetcode-cn.com/problems/longest-consecutive-sequence/
 */
class LongestConsecutiveSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums)
    {
        $max = 0;
        $nums = array_unique($nums);
        foreach ($nums as $n) {
            if (!in_array($n - 1, $nums)) {
                $cur_max = 1;
                $cur = $n;
                while (in_array($cur + 1, $nums)) {
                    $cur_max++;
                    $cur++;
                }
                $max = max($max, $cur_max);
            }
        }
        return $max;
    }
}