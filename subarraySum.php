<?php

/**
 * 560. 和为K的子数组
 * Class SubarraySumSolution
 * https://leetcode-cn.com/problems/subarray-sum-equals-k/
 */
class SubarraySumSolution
{

    /**
     * 暴力 枚举 超时
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k)
    {
        $count = 0;
        foreach ($nums as $i => $n) {
            $sum = 0;
            for ($end = $i; $end >= 0; $end--) {
                $sum += $nums[$end];
                if ($sum == $k) {
                    $count++;
                }
            }
        }
        return $count;
    }

    /**
     * 暴力 后缀和 超时
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum2($nums, $k)
    {
        $res = 0;
        $tmp = [];
        foreach ($nums as $i => $n) {
            $tmp[$k] ? $tmp[$k]++ : $tmp[$k] = 1;
            $res += $tmp[$n] ?: 0;
            $next_tmp = [];
            foreach ($tmp as $j => $item) {
                $next_tmp[$j - $n] = $item;
            }
            $tmp = $next_tmp;
        }
        return $res;
    }

    /**
     * 优化 前缀和
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum3($nums, $k)
    {
        $res = 0;
        $pre = 0;
        $tmp = [0 => 1];
        foreach ($nums as $i => $n) {
            $pre += $n;
            $res += $tmp[$pre - $k] ?: 0;
            $tmp[$pre] ? $tmp[$pre]++ : $tmp[$pre] = 1;
        }
        return $res;
    }
}