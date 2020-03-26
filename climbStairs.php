<?php

/**
 * 70. 爬楼梯
 * Class ClimbStairsSolution
 * https://leetcode-cn.com/problems/climbing-stairs/
 */
class ClimbStairsSolution
{

    private $ary = [];

    /**
     * 递归 超时解
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        return $this->step(0, $n);
    }

    /**
     * 递归 优化
     * @param Integer $step
     * @param Integer $n
     * @return Integer
     */
    function step($step, $n)
    {
        if ($step == $n) {
            return 1;
        }
        if ($step > $n) {
            return 0;
        }
        return $this->step($step + 1, $n) + $this->step($step + 2, $n);
    }

    /**
     * 递归
     * @param Integer $step
     * @param Integer $n
     * @return Integer
     */
    function step2($step, $n)
    {
        if ($step == $n) {
            return 1;
        }
        if ($step > $n) {
            return 0;
        }
        if (in_array($step, $this->ary)) {
            return $this->ary[$step];
        }
        $res = $this->step($step + 1, $n) + $this->step($step + 2, $n);
        $this->ary[$step] = $res;
        return $res;
    }

    /**
     * 动态规划 dp[i] = dp[i-1] + dp[i-2]
     * @param Integer $n
     * @return Integer
     */
    function climbStairsDP($n)
    {
        $dp = [1, 1];
        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }
}