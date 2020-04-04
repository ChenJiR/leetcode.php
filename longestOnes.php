<?php

/**
 * 1004. 最大连续1的个数 III
 * Class LongestOnesSolution
 * https://leetcode-cn.com/problems/max-consecutive-ones-iii/
 */
class LongestOnesSolution
{

    /**
     * 滑动窗口
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    function longestOnes($A, $K)
    {
        $max = $left = $right = 0;
        $tmp_0 = 0;
        foreach ($A as $a) {
            $right++;
            if ($a == 0) {
                $tmp_0++;
            }
            if ($tmp_0 > $K) {
                for ($i = $left; $i < $right; $i++) {
                    if ($A[$i] == 0) {
                        $tmp_0--;
                    }
                    if ($tmp_0 <= $K) {
                        break;
                    }
                }
                $left = $i + 1;
            }
            $max = max($max, ($right - $left));
        }
        return $max;
    }
}

var_dump((new LongestOnesSolution())->longestOnes([0, 0,0,1], 0));