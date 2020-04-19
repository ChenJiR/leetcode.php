<?php


/**
 * 713. 乘积小于K的子数组
 * Class NumSubarrayProductLessThanKSolution
 * https://leetcode-cn.com/problems/subarray-product-less-than-k/
 */
class NumSubarrayProductLessThanKSolution
{

    /**
     * 双指针
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numSubarrayProductLessThanK($nums, $k)
    {
        if ($k <= 1) return 0;
        $res = 0;
        $prod = 1;
        $left = 0;
        foreach ($nums as $right => $n) {
            $prod *= $n;
            while ($prod >= $k) {
                $prod /= $nums[$left++];
            }
            $res += $right - $left + 1;
        }
        return $res;
    }
}