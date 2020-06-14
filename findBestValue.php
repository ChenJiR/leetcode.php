<?php

/**
 * 1300. 转变数组后最接近目标值的数组和
 * Class FindBestValueSolution
 * https://leetcode-cn.com/problems/sum-of-mutated-array-closest-to-target/
 */
class FindBestValueSolution
{

    /**
     * 排序后逐个比对 复杂度 O(nlogn + n) 比二分法复杂度高
     * @param Integer[] $arr
     * @param Integer $target
     * @return Integer
     */
    function findBestValue($arr, $target)
    {
        if (empty($arr)) return null;
        sort($arr);
        $sum = 0;
        $count = count($arr);
        for ($i = 0; $i < $count; $i++) {
            $x = ($target - $sum) / ($count - $i);
            if ($x < $arr[$i]) {
                return $x - intval($x) > 0.5 ? intval($x) + 1 : intval($x);
            }
            $sum += $arr[$i];
        }
        return $arr[$count - 1];
    }
}