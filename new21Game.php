<?php

/**
 * 837. 新21点
 * Class New21GameSolution
 * https://leetcode-cn.com/problems/new-21-game/
 */
class New21GameSolution
{

    /**
     * 超时解
     * @param Integer $N
     * @param Integer $K
     * @param Integer $W
     * @return Float
     */
    function new21Game($N, $K, $W)
    {
        if ($K == 0) return 1;
        $chance = 1 / $W;
        $dp = [1];
        for ($i = 1; $i < $K; $i++) {
            for ($j = $i - $W < 0 ? 0 : $i - $W; $j < $i; $j++) {
                $dp[$i] += $dp[$j] * $chance;
            }
        }
        $res = 0;
        for ($i = $K - $W; $i < $K; $i++) {
            $times = 0;
            for ($j = 1; $j <= $W; $j++) {
                if ($i + $j <= $N && $i + $j >= $K) {
                    $times++;
                }
            }
            $res += $dp[$i] * $times * $chance;
        }
        return $res;
    }

    /**
     * @param $N
     * @param $K
     * @param $W
     * @return float|int
     */
    function new21Game_2($N, $K, $W)
    {
        if ($K == 0) return 1;
        $dp = [];
        $dp[$K - 1] = 1 * min($N - $K + 1, $W) / $W;
        for ($i = $K; $i <= $N && $i < $K + $W; $i++) {
            $dp[$i] = 1;
        }
        for ($i = $K - 2; $i >= 0; $i--) {
            $dp[$i] = $dp[$i + 1] - ($dp[$i + $W + 1] - $dp[$i + 1]) / $W;
        }
        return $dp[0];
    }
}