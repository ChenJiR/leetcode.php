<?php

/**
 * 409. 最长回文串
 * Class LongestPalindromeSolution
 * https://leetcode-cn.com/problems/longest-palindrome/
 */
class LongestPalindromeSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s)
    {
        $dictionary = [];
        foreach (str_split($s) as $str) {
            isset($dictionary[$str]) ? $dictionary[$str]++ : $dictionary[$str] = 1;
        }
        $middle = false;
        $res = 0;
        foreach ($dictionary as $str => $num) {
            if ($num % 2 == 1) {
                $middle = true;
                $res += $num - 1;
            } else {
                $res += $num;
            }
        }
        return $res + ($middle ? 1 : 0);
    }
}