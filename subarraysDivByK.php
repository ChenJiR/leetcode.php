<?php

/**
 * 974. 和可被 K 整除的子数组
 * Class SubarraysDivByKSolution
 * https://leetcode-cn.com/problems/subarray-sums-divisible-by-k/
 */
class SubarraysDivByKSolution
{

    /**
     * 暴力
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    function subarraysDivByK($A, $K)
    {
        $dp = [];
        $res = 0;
        foreach ($A as $i => $item) {
            $each_res = $item % $K;
            $dp[$i][$i] = $each_res;
            $res += $each_res == 0 ? 1 : 0;
            for ($j = $i + 1; $j < count($A); $j++) {
                $each_res = ($A[$j] + $dp[$i][$j - 1]) % $K;
                $dp[$i][$j] = $each_res;
                $res += $each_res == 0 ? 1 : 0;
            }
        }
        return $res;
    }

    /**
     * 哈希表
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    function subarraysDivByK_2($A, $K)
    {
        $record = [0 => 1];
        $sum = $res = 0;
        foreach ($A as $item) {
            $sum += $item;
            $modulus = ($sum % $K + $K) % $K;
            $same = $record[$modulus] ?: 0;
            $res += $same;
            $record[$modulus] = $same + 1;
        }
        return $res;
    }
}