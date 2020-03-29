<?php

/**
 * 1578. 面试题65. 不用加减乘除做加法
 * Class Solution
 * https://leetcode-cn.com/problems/bu-yong-jia-jian-cheng-chu-zuo-jia-fa-lcof/
 */
class Solution
{

    /**
     * 利用二进制位运算加法公式 a+b = (a^b)+((a&b)<<1)
     * 由于又出现了加法 则必须使 a=a^b,b=(a&b)<<1) 继续进行循环相加 直到 (a&b)<<1 = 0
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function add($a, $b)
    {
        while ($b != 0) {
            $sum = $a ^ $b;
            $b = ($a & $b) << 1;
            $a = $sum;
        }
        return $a;
    }
}