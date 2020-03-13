<?php

/**
 * 1554. 面试题57 - II. 和为s的连续正数序列
 * Class FindContinuousSequenceSolution
 * https://leetcode-cn.com/problems/he-wei-sde-lian-xu-zheng-shu-xu-lie-lcof/
 */
class FindContinuousSequenceSolution {

    /**
     * @param Integer $target
     * @return Integer[][]
     */
    function findContinuousSequence($target) {
        $result = [];
        /**
         * 给定数字个数及数字和，求首项
         * 设res为首项 则有 target = n * res + ( n(n-1) / 2 )
         * 转换为 res = ( target/n ) - ( n(n-1) / 2n )
         * @param $target
         * @param $n
         * @return float|int
         */
        $getHead = function ($target, $n) {
            return ($target / $n) - (($n * ($n - 1)) / (2 * $n));
        };
        for ($n = 2; $n < $target; $n++) {
            $head = $getHead($target, $n);
            if ($head <= 0) {
                break;
            }
            //首项不为小数
            if (floor($head) == $head) {
                $each_result = [];
                for ($num = 0; $num < $n; $num++) {
                    $each_result[] = $head + $num;
                }
                $result[] = $each_result;
            }
        }
        return array_reverse($result);
    }
}