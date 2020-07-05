<?php

/**
 * 44. 通配符匹配
 * Class IsMatchSolution
 * https://leetcode-cn.com/problems/wildcard-matching/
 */
class IsMatchSolution
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        $dp = [];
        $dp[0][0] = true;
        for ($j = 1; $j <= strlen($p); $j++) {
            if ($p[$j - 1] == "*") {
                $dp[0][$j] = $dp[0][$j - 1];
            } else {
                $dp[0][$j] = false;
            }
        }
        for ($i = 1; $i <= strlen($s); $i++) {
            $dp[$i][0] = false;
        }
        for ($i = 1; $i <= strlen($s); $i++) {
            for ($j = 1; $j <= strlen($p); $j++) {
                if ($s[$i - 1] == $p[$j - 1] || $p[$j - 1] == "?") {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else if ($p[$j - 1] == "*") {
                    $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i][$j - 1] || $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = false;
                }
            }
        }
        return $dp[strlen($s)][strlen($p)];
    }
}