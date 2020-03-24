<?php

/**
 * 1496. 面试题 17.16. 按摩师
 * Class MassageSolution
 * https://leetcode-cn.com/problems/the-masseuse-lcci/
 */
class MassageSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function massage($nums)
    {
        $n = count($nums);
        if ($n == 0) {
            return 0;
        }
        $dp0 = 0;
        $dp1 = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $tmp_dp0 = max($dp0, $dp1);
            $tmp_dp1 = $dp0 + $nums[$i];
            $dp0 = $tmp_dp0;
            $dp1 = $tmp_dp1;
        }
        return max($dp0, $dp1);
    }
}