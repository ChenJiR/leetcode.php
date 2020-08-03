<?php

/**
 * 343. 整数拆分
 * Class IntegerBreakSolution
 * https://leetcode-cn.com/problems/integer-break/
 */
class IntegerBreakSolution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n)
    {
        $dp = [0, 1];
        for ($i = 2; $i <= $n; $i++) {
            for ($j = $i - 1; $j >= 1; $j--) {
                $dp[$i] = max($dp[$i], $dp[$j] * ($i - $j), $j * ($i - $j));
            }
        }
        return $dp[$n];
    }
}