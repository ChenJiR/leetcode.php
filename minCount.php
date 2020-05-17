<?php

/**
 * 1459. LCP 06. 拿硬币
 * Class MinCountSolution
 * https://leetcode-cn.com/problems/na-ying-bi/
 */
class MinCountSolution
{

    /**
     * @param Integer[] $coins
     * @return Integer
     */
    function minCount($coins)
    {
        $res = 0;
        foreach ($coins as $coin)
            $res += intval(($coin + 1) / 2);
        return $res;
    }
}