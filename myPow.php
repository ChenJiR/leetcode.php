<?php

/**
 * 50. Pow(x, n)
 * Class MyPowSolution
 * https://leetcode-cn.com/problems/powx-n/
 */
class MyPowSolution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($x == 0) return 0;
        if ($n < 0) {
            $x = 1 / $x;
            $n = abs($n);
        }
        return $this->halfPow($x, $n);
    }

    function halfPow($x, $n)
    {
        if ($n == 0) {
            return 1;
        }
        $half = $this->halfPow($x, $n / 2);
        if ($n % 2 == 0) {
            return $half * $half;
        } else {
            return $half * $half * $x;
        }
    }
}

var_dump((new MyPowSolution())->halfPow(2, 10));