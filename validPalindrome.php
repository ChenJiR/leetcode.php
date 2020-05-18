<?php

/**
 * 680. 验证回文字符串 Ⅱ
 * Class ValidPalindromeSolution
 * https://leetcode-cn.com/problems/valid-palindrome-ii/
 */
class ValidPalindromeSolution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s)
    {
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            if (strtolower($s[$left]) != strtolower($s[$right])) {
                return $this->helper(substr($s, $left, $right - $left))
                    || $this->helper(substr($s, $left + 1, $right - $left));
            }
            $left++;
            $right--;
        }
        return true;
    }

    /**
     * @param String $s
     * @return Boolean
     */
    function helper($s)
    {
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            if (strtolower($s[$left++]) != strtolower($s[$right--])) {
                return false;
            }
        }
        return true;
    }
}