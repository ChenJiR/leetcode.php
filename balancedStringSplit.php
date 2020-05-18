<?php

/**
 * 1221. 分割平衡字符串
 * Class BalancedStringSplitSolution
 * https://leetcode-cn.com/problems/split-a-string-in-balanced-strings/
 */
class BalancedStringSplitSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function balancedStringSplit($s)
    {
        $res = 0;
        $stack = [$s[0]];
        for ($i = 1; $i < strlen($s); $i++) {
            $str = $s[$i];
            if (
                ($str == "L" && end($stack) == "R") ||
                ($str == "R" && end($stack) == "L")
            ) {
                array_pop($stack);
            } else {
                $stack[] = $str;
            }
            empty($stack) && $res++;
        }
        return $res;
    }
}