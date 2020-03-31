<?php

/**
 * 349. 两个数组的交集
 * Class IntersectionSolution
 * https://leetcode-cn.com/problems/intersection-of-two-arrays/
 */
class IntersectionSolution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2)
    {
        $res = [];
        foreach (array_unique($nums1) as $n) {
            if (in_array($n, $nums2)) {
                $res[] = $n;
            }
        }
        return $res;
    }
}