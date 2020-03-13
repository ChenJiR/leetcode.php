<?php

/**
 * 1. 两数之和
 * Class TwoSumSolution
 * https://leetcode-cn.com/problems/two-sum/
 */
class TwoSumSolution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $result = [];
        foreach ($nums as $r1 => $a) {
            foreach ($nums as $r2 => $b) {
                if ($r1 == $r2) {
                    continue;
                }
                if ($a + $b == $target) {
                    $result = [$r1, $r2];
                    break 2;
                }
            }
        }
        return $result;
    }
}