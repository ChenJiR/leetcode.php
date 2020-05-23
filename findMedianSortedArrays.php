<?php

/**
 * 4. 寻找两个正序数组的中位数
 * Class FindMedianSortedArraysSolution
 * https://leetcode-cn.com/problems/median-of-two-sorted-arrays/
 */
class FindMedianSortedArraysSolution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        if (count($nums1) > count($nums2)) {
            list($nums1, $nums2) = [$nums2, $nums1];
        }
        $m = count($nums1);
        $n = count($nums2);

        $total_left = intval(($m + $n + 1) / 2);

        $left = 0;
        $right = $m;
        while ($left < $right) {
            $i = $left + intval(($right - $left) / 2);
            $j = $total_left - $i;
            $nums2[$j - 1] > $nums1[$i] ? $left = $i + 1 : $right = $i;
        }
        $i = $left;
        $j = $total_left - $i;
        $n1max = $i == 0 ? PHP_INT_MIN : $nums1[$i - 1];
        $n1min = $i == $m ? PHP_INT_MAX : $nums1[$i];
        $n2max = $j == 0 ? PHP_INT_MIN : $nums2[$j - 1];
        $n2min = $j == $n ? PHP_INT_MAX : $nums2[$j];

        return ($m + $n) % 2 == 1
            ? max($n1max, $n2max)
            : (max($n1max, $n2max) + min($n1min, $n2min)) / 2;
    }
}