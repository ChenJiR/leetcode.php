<?php

/**
 * 1046. 最后一块石头的重量
 * Class LastStoneWeightSolution
 * https://leetcode-cn.com/problems/last-stone-weight/
 */
class LastStoneWeightSolution
{

    /**
     * 大根堆模拟
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones)
    {
        $stonesHeap = new SplMaxHeap();
        foreach ($stones as $stone) {
            $stonesHeap->insert($stone);
        }
        while ($stonesHeap->count() > 1) {
            $y = $stonesHeap->extract();
            $x = $stonesHeap->extract();
            if ($x != $y) {
                $stonesHeap->insert($y - $x);
            }
        }
        return $stonesHeap->count() == 0 ? 0 : $stonesHeap->extract();
    }
}