<?php


/**
 * 1644.面试题46. 把数字翻译成字符串
 * Class TranslateNumSolution
 * https://leetcode-cn.com/problems/ba-shu-zi-fan-yi-cheng-zi-fu-chuan-lcof/
 */
class TranslateNumSolution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function translateNum($num)
    {
        $num = strval($num);
        $n = 1;
        $cur = 1;
        for ($i = 1; $i < strlen($num); $i++) {
            $each = intval($num[$i - 1] . $num[$i]);
            $tmp = $each >= 10 && $each <= 25 ? $cur + $n : $cur;
            $n = $cur;
            $cur = $tmp;
        }
        return $cur;
    }
}