<?php

/**
 * 1014. 最佳观光组合
 * Class MaxScoreSightseeingPairSolution
 * https://leetcode-cn.com/problems/best-sightseeing-pair/
 */
class MaxScoreSightseeingPairSolution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function maxScoreSightseeingPair($A)
    {
        $left = $A[0];
        $res = PHP_INT_MIN;
        for ($i = 1; $i < count($A); $i++) {
            $res = max($res, $left + $A[$i] - $i);
            $left = max($left, $A[$i] + $i);
        }
        return $res;
    }
}