<?php

/**
 * 887. 鸡蛋掉落
 * Class SuperEggDropSolution
 * https://leetcode-cn.com/problems/super-egg-drop/
 */
class SuperEggDropSolution
{

    private $memo = [];

    /**
     * DP
     * 状态转移方程为 dp(K,N) = 1 + min(max(dp(K - 1,X - 1),dp(K,N - 1))) ,其中X为楼层数
     * @param Integer $K
     * @param Integer $N
     * @return Integer
     */
    function superEggDrop($K, $N)
    {
        if ($K == 1) return $N;
        if ($N == 0) return 0;
        if (isset($this->memo["$K|$N"])) return $this->memo["$K|$N"];

        $res = PHP_INT_MAX;
        $low = 1;
        $high = $N;
        while ($low <= $high) {
            $middle = intval(($low + $high) / 2);
            $broken = $this->superEggDrop($K - 1, $middle - 1);
            $not_broken = $this->superEggDrop($K, $N - $middle);
            if ($broken > $not_broken) {
                $high = $middle - 1;
                $res = min($res, $broken + 1);
            } else {
                $low = $middle + 1;
                $res = min($res, $not_broken + 1);
            }
            $this->memo["$K|$N"] = $res;
        }
        return $res;
    }

}