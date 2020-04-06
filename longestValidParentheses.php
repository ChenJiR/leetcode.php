<?php

/**
 * 32. 最长有效括号
 * Class LongestValidParenthesesSolution
 * https://leetcode-cn.com/problems/longest-valid-parentheses/
 */
class LongestValidParenthesesSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $max = 0;
        $tmp = [-1];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == "(") {
                $tmp[] = $i;
            } else {
                array_pop($tmp);
                if (empty($tmp)) {
                    $tmp[] = $i;
                } else {
                    $max = max($max, $i - end($tmp));
                }
            }
        }
        return $max;
    }

}
