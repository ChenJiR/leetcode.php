<?php

/**
 * 977. 有序数组的平方
 * Class SortedSquaresSolution
 * https://leetcode-cn.com/problems/squares-of-a-sorted-array/
 */
class SortedSquaresSolution
{

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A)
    {
        $res = [];
        $left = 0;
        $right = count($A) - 1;
        while ($left < $right) {
            $tmp_right = abs($A[$right]);
            $tmp_left = abs($A[$left]);
            if ($tmp_right > $tmp_left) {
                $res[] = $A[$right] * $A[$right];
                $right--;
            } else if ($tmp_right < $tmp_left) {
                $res[] = $A[$left] * $A[$left];
                $left++;
            } else {
                $res[] = $A[$right] * $A[$right];
                $res[] = $A[$left] * $A[$left];
                $right--;
                $left++;
            }
        }
        $left == $right && $res[] = $A[$right] * $A[$right];
        return array_reverse($res);
    }
}