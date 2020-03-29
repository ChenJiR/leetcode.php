<?php

/**
 * 1561. 面试题50. 第一个只出现一次的字符
 * Class FirstUniqCharSolution
 * https://leetcode-cn.com/problems/di-yi-ge-zhi-chu-xian-yi-ci-de-zi-fu-lcof/
 */
class FirstUniqCharSolution
{

    /**
     * @param String $s
     * @return String
     */
    function firstUniqChar($s)
    {
        $dic = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $w = $s[$i];
            isset($dic[$w]) ? $dic[$w]++ : $dic[$w] = 1;
        }
        foreach ($dic as $w => $times) {
            if ($times == 1) {
                return $w;
            }
        }
        return " ";
    }
}