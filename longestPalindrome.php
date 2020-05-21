<?php

/**
 *
 * 5. 最长回文子串
 * https://leetcode-cn.com/problems/longest-palindromic-substring/
 * 409. 最长回文串
 * https://leetcode-cn.com/problems/longest-palindrome/
 *
 * Class LongestPalindromeSolution
 */
class LongestPalindromeSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome_409($s)
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

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome_5($s)
    {
        $n = strlen($s);
        $dp = [];
        $res = "";
        for ($i = 1; $i <= $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $m = $i + $j - 1;
                if ($m >= $n) {
                    break;
                }
                if ($i == 1) {
                    $dp[$j][$m] = true;
                } else if ($i == 2) {
                    $dp[$j][$m] = ($s[$j] == $s[$m]);
                } else {
                    $dp[$j][$m] = ($dp[$j + 1][$m - 1] && $s[$j] == $s[$m]);
                }
                if ($dp[$j][$m] && $i > strlen($res)) {
                    $res = substr($s, $j, $i);
                }
            }
        }
        return $res;
    }
}

var_dump((new LongestPalindromeSolution())->longestPalindrome_5("babad"));