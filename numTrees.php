<?php

/**
 * 96. 不同的二叉搜索树
 * Class Solution
 * https://leetcode-cn.com/problems/unique-binary-search-trees/solution/
 */
class NumTreesSolution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n)
    {
        $dp = [1, 1];
        for ($i = 2; $i <= $n; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $dp[$i] += $dp[$j - 1] * $dp[$i - $j];
            }
        }
        return $dp[$n];
    }
}