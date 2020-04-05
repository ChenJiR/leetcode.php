<?php

/**
 * 238. 除自身以外数组的乘积
 * Class ProductExceptSelfSolution
 * https://leetcode-cn.com/problems/product-of-array-except-self/solution/
 */
class ProductExceptSelfSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums)
    {
        $n = count($nums);
        $left = $right = [];
        $leftk = $rightk = 1;
        for ($i = 0; $i < $n; $i++) {
            $left[$i] = $leftk;
            $leftk *= $nums[$i];

            $right[$n - $i - 1] = $rightk;
            $rightk *= $nums[$n - $i - 1];
        }
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            $res[$i] = $left[$i] * $right[$i];
        }
        return $res;
    }

    /**
     * 优化空间复杂度
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf2($nums)
    {
        $n = count($nums);
        $leftk = $rightk = 1;
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            $res[$i] = (isset($res[$i]) ? $res[$i] : 1) * $leftk;
            $leftk *= $nums[$i];

            $res[$n - $i - 1] = (isset($res[$n - $i - 1]) ? $res[$n - $i - 1] : 1) * $rightk;
            $rightk *= $nums[$n - $i - 1];
        }
        ksort($res);
        return $res;
    }
}