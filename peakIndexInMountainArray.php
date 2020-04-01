<?php

/**
 * 852. 山脉数组的峰顶索引
 * Class PeakIndexInMountainArraySolution
 * https://leetcode-cn.com/problems/peak-index-in-a-mountain-array/
 */
class PeakIndexInMountainArraySolution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function peakIndexInMountainArray($A)
    {
        $count = count($A);
        $left = 0;
        $right = $count - 1;
        $middle = intval(($left + $right) / 2);
        while ($A[$middle - 1] > $A[$middle] || $A[$middle + 1] > $A[$middle]) {
            if ($A[$middle - 1] > $A[$middle]) {
                $right = $middle;
            } else {
                $left = $middle;
            }
            $middle = intval(($left + $right) / 2);
        }
        return $middle;
    }
}

var_dump((new PeakIndexInMountainArraySolution())->peakIndexInMountainArray([0, 1, 0]));