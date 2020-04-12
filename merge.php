<?php

/**
 * 56. 合并区间
 * https://leetcode-cn.com/problems/merge-intervals/submissions/
 *
 * 88. 合并两个有序数组
 * https://leetcode-cn.com/problems/merge-sorted-array/
 * 1439. 面试题 10.01. 合并排序的数组
 * https://leetcode-cn.com/problems/sorted-merge-lcci/
 * Class MergeSolution
 */
class MergeSolution
{

    /**
     * 88 | 1439
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge_88_1439_1(&$A, $m, $B, $n)
    {
        foreach ($B as $item) {
            $A[$m++] = $item;
        }
        sort($A);
    }

    /**
     * 88|1439. 双指针
     * @param $nums1
     * @param Integer $m
     * @param $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge_88_1439_2(&$nums1, $m, $nums2, $n)
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


    /**
     * 56
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge_56($intervals)
    {
        if (empty($intervals)) return [];
        //先排序
        $intervals = $this->quicksort($intervals);
        $res = [];
        list($start, $end) = $intervals[0];
        for ($i = 1; $i < count($intervals); $i++) {
            $each = $intervals[$i];
            if ($end >= $each[0]) {
                $end = max($end, $each[1]);
            } else {
                $res[] = [$start, $end];
                list($start, $end) = $each;
            }
        }
        $res[] = [$start, $end];
        return $res;
    }

    function quicksort($intervals)
    {
        if (empty($intervals)) return [];
        $index = $intervals[0][0];
        $right = $left = [];
        for ($i = 1; $i < count($intervals); $i++) {
            $intervals[$i][0] > $index ? $right[] = $intervals[$i] : $left[] = $intervals[$i];
        }
        return array_merge(
            $this->quicksort($left),
            [$intervals[0]],
            $this->quicksort($right)
        );
    }
}
