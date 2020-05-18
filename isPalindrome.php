<?php

/**
 * 9. 回文数
 * https://leetcode-cn.com/problems/palindrome-number/
 *
 * 125. 验证回文串
 * https://leetcode-cn.com/problems/valid-palindrome/
 *
 * Class IsPalindromeSolution
 */
class IsPalindromeSolution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome_9($x)
    {
        $strx = strval($x);
        $left = 0;
        $right = strlen($x) - 1;
        while ($left < $right) {
            if ($strx[$left++] !== $strx[$right--]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome_125($s)
    {
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            while ($left < $right && !ctype_alnum($s[$left])) $left++;
            while ($left < $right && !ctype_alnum($s[$right])) $right--;
            if (strtolower($s[$left++]) != strtolower($s[$right--])) return false;
        }
        return true;
    }
}