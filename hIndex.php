<?php

/**
 * 274. H 指数
 * Class HIndexSolution
 * https://leetcode-cn.com/problems/h-index/
 */
class HIndexSolution
{

    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex($citations)
    {
        rsort($citations);
        $max = 0;
        foreach ($citations as $i => $citation) {
            $max = max($max, min($i + 1, $citation));
        }
        return $max;
    }
}