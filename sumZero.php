<?php

/**
 * 1304. 和为零的N个唯一整数
 * Class SumZeroSolution
 * https://leetcode-cn.com/problems/find-n-unique-integers-sum-up-to-zero/
 */
class SumZeroSolution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n)
    {
        $res = [];
        if ($n / 2 == 1) {
            $n--;
            $res = [0];
        }
        for ($i = 1; $i <= $n/2; $i++) {
            $res[] = $i;
            $res[] = -$i;
        }
        return $res;
    }

}