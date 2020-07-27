<?php

/**
 * 392. 判断子序列
 * Class IsSubsequenceSolution
 * https://leetcode-cn.com/problems/is-subsequence/
 */
class IsSubsequenceSolution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        $i = $j = 0;
        while ($i < strlen($s) && $j < strlen($t)) {
            if ($s[$i] == $t[$j]) {
                $i++;
            }
            $j++;
        }
        return $i == strlen($s);
    }
}