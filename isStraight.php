<?php


/**
 * 1587. 面试题61. 扑克牌中的顺子
 * Class IsStraightSolution
 * https://leetcode-cn.com/problems/bu-ke-pai-zhong-de-shun-zi-lcof/
 */
class IsStraightSolution
{

    /**
     * 排序后模拟
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight($nums)
    {
        sort($nums);
        $h = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($nums[$i] === 0) {
                $h++;
                continue;
            }
            if ($nums[$i] == $nums[$i + 1]) {
                return false;
            }
            if ($nums[$i] + 1 != $nums[$i + 1]) {
                $h -= $nums[$i + 1] - $nums[$i];
                if ($h < 0) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 最大最小值判断
     * 若有重复值一定false；没有重复值的情况下，0除外，最大最小值相差小于等于4即为true
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight2($nums)
    {
        $max = PHP_INT_MIN;
        $min = PHP_INT_MAX;
        $ary = [];
        foreach ($nums as $n) {
            if ($n == 0) {
                continue;
            }
            if (in_array($n, $ary)) {
                return false;
            }
            $ary[] = $n;
            $max = max($max, $n);
            $min = min($min, $n);
        }
        return $max - $min <= 4;
    }
}