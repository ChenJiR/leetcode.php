<?php

/**
 * 1440. 面试题 08.03. 魔术索引
 * Class FindMagicIndexSolution
 * https://leetcode-cn.com/problems/magic-index-lcci/
 */
class FindMagicIndexSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMagicIndex($nums)
    {
        foreach ($nums as $i => $n) {
            if ($i == $n) {
                return $i;
            }
        }
        return -1;
    }
}