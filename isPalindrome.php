<?php

/**
 * 9. 回文数
 * Class IsPalindromeSolution
 * https://leetcode-cn.com/problems/palindrome-number/
 */
class IsPalindromeSolution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
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
}