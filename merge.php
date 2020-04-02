<?php

/**
 * 88. 合并两个有序数组
 * 1439. 面试题 10.01. 合并排序的数组
 * Class MergeSolution
 * https://leetcode-cn.com/problems/sorted-merge-lcci/
 */
class MergeSolution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n)
    {
        foreach ($B as $item) {
            $A[$m++] = $item;
        }
        sort($A);
    }

    /**
     * 双指针
     * @param $nums1
     * @param Integer $m
     * @param $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge2(&$nums1, $m, $nums2, $n)
    {
        $tmp = [];
        $a = $b = 0;
        while ($a < $m || !empty($nums2)) {
            if ($a < $m && $nums1[$a] <= (isset($nums2[0]) ? $nums2[0] : PHP_INT_MAX)) {
                $tmp[] = $nums1[$a];
                $a++;
            } else {
                $tmp[] = array_shift($nums2);
            }
        }
        $nums1 = array_merge($tmp, $nums2);
    }
}
