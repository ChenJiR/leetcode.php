<?php

/**
 * 215. 数组中的第K个最大元素
 * Class FindKthLargestSolution
 * https://leetcode-cn.com/problems/kth-largest-element-in-an-array/
 */
class FindKthLargestSolution
{

    /**
     * 大根堆
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $max_heap = new SplMaxHeap();
        foreach ($nums as $n) {
            $max_heap->insert($n);
        }
        for ($i = 0; $i < $k; $i++) {
            $res = $max_heap->extract();
        }
        return $res;
    }
}