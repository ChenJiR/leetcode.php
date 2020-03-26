<?php

/**
 * 118. 杨辉三角
 * Class GenerateSolution
 * https://leetcode-cn.com/problems/pascals-triangle/
 */
class GenerateSolution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        return $this->generateLine($numRows, [1], []);
    }

    function generateLine($nums, $line, $res)
    {
        if (count($line) >= $nums) {
            return $res;
        }
        $res[] = $line;
        $next = [];
        for ($i = -1; $i < count($line); $i++) {
            $next[] = ($line[$i] ?: 0) + $line[$i + 1];
        }
        return $this->generateLine($nums, $next, $res);
    }
}