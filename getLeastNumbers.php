<?php

/**
 * 1538. 面试题40. 最小的k个数
 * Class GetLeastNumbersSolution
 * https://leetcode-cn.com/problems/zui-xiao-de-kge-shu-lcof/
 */
class GetLeastNumbersSolution
{
    /**
     * 快排法
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers($arr, $k)
    {
        if (empty($arr) || $k == 0) {
            return [];
        }
        $end = count($arr) - 1;
        $v = $arr[0];
        $left = 0;
        $right = $end;
        while ($left < $right) {
            while ($left < $right && $arr[$right] >= $v) {
                $right--;
            }
            $arr[$left] = $arr[$right];
            while ($left < $right && $arr[$left] < $v) {
                $left++;
            }
            $arr[$right] = $arr[$left];
            $arr[$left] = $v;
        }
        if ($left == $k) {
            return array_slice($arr, 0, $left);
        }
        if ($left > $k) {
            return $this->getLeastNumbers(array_slice($arr, 0, $left), $k);
        }
        if ($left < $k) {
            $left_ary = array_slice($arr, 0, $left);
            if ($k == $left + 1) {
                return array_merge($left_ary, [$v]);
            } else {
                $left_ary = array_merge($left_ary, [$v]);
                $right_ary = $this->getLeastNumbers(array_slice($arr, $left + 1), $k - $left - 1);
                return array_merge($left_ary, $right_ary);
            }
        }
    }

    /**
     * 附：快速排序
     * @param $arr
     * @return array
     */
    function quick_sort($arr)
    {
        $end = count($arr) - 1;
        $v = $arr[0];
        $left = 0;
        $right = $end;
        while ($left < $right) {
            while ($left < $right && $arr[$right] >= $v) {
                $right--;
            }
            $arr[$left] = $arr[$right];
            while ($left < $right && $arr[$left] < $v) {
                $left++;
            }
            $arr[$right] = $arr[$left];
            $arr[$left] = $v;
        }
        $left_ary = $right_ary = [];
        if (0 < $left) {
            $left_ary = $this->quick_sort(array_slice($arr, 0, $left));
        }
        if ($right < $end) {
            $right_ary = $this->quick_sort(array_slice($arr, $right + 1));
        }
        return array_merge($left_ary, [$v], $right_ary);
    }

    /**
     * 大根堆解法
     * @param $arr
     * @param $k
     * @return array
     */
    function getLeastNumbers2($arr, $k)
    {
        if (empty($arr) || $k == 0) {
            return [];
        }
        $heap = new SplMaxHeap();
        foreach (array_slice($arr, 0, $k) as $value) {
            $heap->insert($value);
        }
        foreach (array_slice($arr, $k) as $value) {
            if ($value < $heap->top()) {
                $heap->extract();
                $heap->insert($value);
            }
        }
        $res = [];
        foreach($heap as $value){
            $res[] = $value;
        }
        return $res;
    }
}

var_dump((new GetLeastNumbersSolution())->getLeastNumbers2([0, 0, 1, 2, 4, 2, 2, 3, 1, 4], 8));