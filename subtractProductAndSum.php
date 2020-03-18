<?php

/**
 * 1281. 整数的各位积和之差
 * Class SubtractProductAndSumSolution
 * https://leetcode-cn.com/problems/subtract-the-product-and-sum-of-digits-of-an-integer/submissions/
 */
class SubtractProductAndSumSolution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function subtractProductAndSum($n)
    {
        $sum = 0;
        $product = 1;
        foreach (str_split($n) as $i) {
            $product *= $i;
            $sum += $i;
        }
        return $product - $sum;
    }
}