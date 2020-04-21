<?php

/**
 * 1248. 统计「优美子数组」
 * Class NumberOfSubarraysSolution
 * https://leetcode-cn.com/problems/count-number-of-nice-subarrays/
 */
class NumberOfSubarraysSolution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numberOfSubarrays($nums, $k)
    {
        $res = 0;
        $i = $j = 0;
        $n = 0;
        while ($j < count($nums)) {
            if ($nums[$j++] % 2 == 1) {
                $n++;
            }
            if ($n == $k) {
                $tmp = $j;
                while ($j < count($nums) && $nums[$j] % 2 == 0) {
                    $j++;
                }
                $j_even_cnt = $j - $tmp;
                $i_even_cnt = 0;
                while ($nums[$i] % 2 == 0) {
                    $i_even_cnt++;
                    $i++;
                }
                $res += ($i_even_cnt + 1) * ($j_even_cnt + 1);
                $i++;
                $n--;
            }
        }
        return $res;
    }
}