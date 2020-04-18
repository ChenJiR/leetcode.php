<?php

/**
 * 1513. 面试题 17.14. 最小K个数
 * Class SmallestKSolution
 * https://leetcode-cn.com/problems/smallest-k-lcci/
 */
class SmallestKSolution
{

    /**
     * 排序解法 不推荐
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function smallestK_1($arr, $k)
    {
        sort($arr);
        $res = [];
        for ($i = 0; $i < $k; $i++) {
            $res[] = $arr[$i];
        }
        return $res;
    }

    /**
     * 快排 解法
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function smallestK_2($arr, $k)
    {
        if ($k == count($arr)) {
            return $arr;
        }
        $index = $arr[0];
        $right = $left = [];
        for ($i = 1; $i < count($arr); $i++) {
            $arr[$i] >= $index ? $right[] = $arr[$i] : $left[] = $arr[$i];
        }
        return $k <= count($left)
            ? $this->smallestK_2($left, $k)
            : array_merge($left, [$index], $this->smallestK_2($right, $k - count($left) - 1));
    }

    /**
     * 小根堆法解法
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function smallestK_3($arr, $k)
    {
        $minHeap = new SplMinHeap();
        foreach ($arr as $item) {
            $minHeap->insert($item);
        }
        $res = [];
        while (count($res) < $k) {
            $res[] = $minHeap->extract();
        }
        return $res;
    }
}

var_dump((new SmallestKSolution())->smallestK_2([1, 3, 5, 7, 2, 4, 6, 8], 4));