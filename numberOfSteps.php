<?php

/**
 * 1342. 将数字变成 0 的操作次数
 * Class NumberOfStepsSolution
 * https://leetcode-cn.com/problems/number-of-steps-to-reduce-a-number-to-zero/
 */
class NumberOfStepsSolution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function numberOfSteps ($num) {
        $step = 0;
        while($num != 0){
            $num = $num % 2 == 0 ? $num/2 : $num-1;
            $step++;
        }
        return $step;
    }
}