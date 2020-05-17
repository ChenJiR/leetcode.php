<?php

/**
 * 152. 乘积最大子数组
 * Class MaxProductSolution
 * https://leetcode-cn.com/problems/maximum-product-subarray/
 */
class MaxProductSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums)
    {
        $max = PHP_INT_MIN;
        $maxtmp = $mintmp = 1;
        foreach ($nums as $n) {
            // n小于0，会携带符号，则最大最小值交换，即可保证最大值
            $n < 0 && list($maxtmp, $mintmp) = [$mintmp, $maxtmp];
            $maxtmp = max($maxtmp * $n, $n);
            $mintmp = min($mintmp * $n, $n);
            $max = max($max, $maxtmp);
        }
        return $max;
    }
}