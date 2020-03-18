<?php

/**
 * 836. 矩形重叠
 * Class IsRectangleOverlapSolution
 * https://leetcode-cn.com/problems/rectangle-overlap/
 */
class IsRectangleOverlapSolution
{

    /**
     * @param Integer[] $rec1
     * @param Integer[] $rec2
     * @return Boolean
     */
    function isRectangleOverlap($rec1, $rec2)
    {
        if ($rec2[1] >= $rec1[3] || $rec2[0] >= $rec1[2]) {
            return false;
        }
        if ($rec2[0] >= $rec1[0] && $rec2[1] >= $rec1[1]) {
            return true;
        }
        if ($rec2[1] > $rec1[1]) {
            return $rec2[2] < $rec1[0] ? false : true;
        }
        if($rec2[0] > $rec1[0]){
            return $rec2[3] < $rec1[1] ? false : true;
        }
        return $rec2[2] < $rec1[0] || $rec2[3] < $rec1[1] ? false : true;
    }
}