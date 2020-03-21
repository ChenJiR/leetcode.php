<?php

/**
 * 1547. 面试题49. 丑数
 * Class NthUglyNumberSolution
 * https://leetcode-cn.com/problems/chou-shu-lcof/
 */
class NthUglyNumberSolution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        // 三指针 dp
        $p2 = $p3 = $p5 = 0;
        $dp[0] = 1;
        for ($i = 1; $i < $n; ++$i) {
            $dp[$i] = min($dp[$p2] * 2, $dp[$p3] * 3, $dp[$p5] * 5);
            if ($dp[$i] == $dp[$p2] * 2) $p2++;
            if ($dp[$i] == $dp[$p3] * 3) $p3++;
            if ($dp[$i] == $dp[$p5] * 5) $p5++;
        }
        return $dp[$n - 1];
    }
}

var_dump((new NthUglyNumberSolution)->nthUglyNumber(7));
