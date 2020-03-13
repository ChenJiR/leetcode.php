<?php

/**
 * 1452. 面试题 16.07. 最大数值
 * Class MaximumSolution
 * https://leetcode-cn.com/problems/maximum-lcci/
 */
class MaximumSolution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function maximum($a, $b) {
        return (($a+$b) + abs($a-$b)) / 2;
    }
}