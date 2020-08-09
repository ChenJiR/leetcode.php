<?php

/**
 * 696. 计数二进制子串
 * Class CountBinarySubstringsSolution
 * https://leetcode-cn.com/problems/count-binary-substrings/
 */
class CountBinarySubstringsSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function countBinarySubstrings($s)
    {
        $last = $ptr = $ans = 0;
        $n = strlen($s);
        while ($ptr < $n) {
            $cur = $s[$ptr];
            $count = 0;
            while ($ptr < $n && $s[$ptr] == $cur) {
                $ptr++;
                $count++;
            }
            $ans += min($count, $last);
            $last = $count;
        }
        return $ans;
    }
}
