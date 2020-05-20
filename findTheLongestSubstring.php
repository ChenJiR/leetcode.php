<?php

/**
 * 1371. 每个元音包含偶数次的最长子字符串
 * Class FindTheLongestSubstringSolution
 * https://leetcode-cn.com/problems/find-the-longest-substring-containing-vowels-in-even-counts/
 */
class FindTheLongestSubstringSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function findTheLongestSubstring($s)
    {
        $res = 0;
        $status = 0;
        $n = strlen($s);
        $pos = [0];
        for ($i = 0; $i < $n; $i++) {
            switch ($s[$i]) {
                case "a":
                    $status ^= 1 << 0;
                    break;
                case "e":
                    $status ^= 1 << 1;
                    break;
                case "i":
                    $status ^= 1 << 2;
                    break;
                case "o":
                    $status ^= 1 << 3;
                    break;
                case "u":
                    $status ^= 1 << 4;
                    break;
            }
            isset($pos[$status]) ? $res = max($res, $i + 1 - $pos[$status]) : $pos[$status] = $i + 1;
        }
        return $res;
    }
}