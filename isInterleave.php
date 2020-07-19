<?php

/**
 * 97. 交错字符串
 * Class IsInterleaveSolution
 * https://leetcode-cn.com/problems/interleaving-string/
 */
class IsInterleaveSolution
{

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3)
    {
        $m = strlen($s1);
        $n = strlen($s2);
        if ($m + $n != strlen($s3)) {
            return false;
        }
        $dp = [[true]];
        for ($i = 0; $i <= $m; $i++) {
            for ($j = 0; $j <= $n; $j++) {
                $cur = $i + $j - 1;
                $i > 0 && $dp[$i][$j] = $dp[$i][$j] || ($dp[$i - 1][$j] && $s3[$cur] == $s1[$i - 1]);
                $j > 0 && $dp[$i][$j] = $dp[$i][$j] || ($dp[$i][$j - 1] && $s3[$cur] == $s2[$j - 1]);
            }
        }
        return $dp[$m][$n];
    }
}