<?php

/**
 * 1450. 面试题 16.01. 交换数字
 * Class SwapNumbersSolution
 * https://leetcode-cn.com/problems/swap-numbers-lcci/submissions/
 */
class SwapNumbersSolution {

    /**
     * @param Integer[] $numbers
     * @return Integer[]
     */
    function swapNumbers($numbers) {
        $numbers[0] = $numbers[1] - $numbers[0];
        $numbers[1] = $numbers[1] - $numbers[0];
        $numbers[0] = $numbers[0] + $numbers[1];
        return $numbers;
    }
}