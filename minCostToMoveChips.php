<?php

/**
 * 1217. 玩筹码
 * Class MinCostToMoveChipsSolution
 * https://leetcode-cn.com/problems/play-with-chips/
 */
class MinCostToMoveChipsSolution
{

    /**
     * @param Integer[] $chips
     * @return Integer
     */
    function minCostToMoveChips($chips)
    {
        $i = $j = 0;
        foreach ($chips as $item) {
            $item % 2 == 1 ? $i++ : $j++;
        }
        return min($i, $j);
    }
}