<?php

/**
 * 1071. 字符串的最大公因子
 * Class GcdOfStringsSolution
 * https://leetcode-cn.com/problems/greatest-common-divisor-of-strings/
 */
class GcdOfStringsSolution
{

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2)
    {
        // 若有最大公因子，则str1必为str2子串或str2为str1子串，两值拼接必然相等
        if ($str1 . $str2 != $str2 . $str1) {
            return "";
        }
        // 若有最大公因子，则公因子长度为两个字符串长度的最大公因数
        return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
    }

    /**
     * 辗转相除法求最大公因数
     * @param $a
     * @param $b
     * @return mixed
     */
    function gcd($a, $b)
    {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }
}