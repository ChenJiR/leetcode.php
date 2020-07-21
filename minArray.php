<?php

/**
 * 9. 面试题11. 旋转数组的最小数字
 * https://leetcode-cn.com/problems/xuan-zhuan-shu-zu-de-zui-xiao-shu-zi-lcof/
 *
 * 153. 寻找旋转排序数组中的最小值
 * https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array/
 *
 * 154. 寻找旋转排序数组中的最小值 II
 * https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array-ii/
 *
 * 1546. 剑指 Offer 11. 旋转数组的最小数字
 * https://leetcode-cn.com/problems/xuan-zhuan-shu-zu-de-zui-xiao-shu-zi-lcof/
 *
 * Class MinArraySolution
 */
class MinArraySolution
{

    /**
     * 暴力法 O(n)
     * @param Integer[] $numbers
     * @return Integer
     */
    function minArray($numbers)
    {
        $tmp = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            if ($numbers[$i] < $tmp) {
                return $numbers[$i];
            }
        }
        return $tmp;
    }

    /**
     * 二分法 O(logn)
     * 相等的情况很复杂 当相等时只能逐个对比
     * @param Integer[] $numbers
     * @return Integer
     */
    function minArray2($numbers)
    {
        $left = 0;
        $right = count($numbers) - 1;
        while ($left < $right) {
            $middle = intval(($left + $right) / 2);
            if ($numbers[$middle] > $numbers[$right]) {
                $left = $middle + 1;
            } else if ($numbers[$middle] < $numbers[$right]) {
                $right = $middle;
            } else {
                $right -= 1;
            }
        }
        return $numbers[$right];
    }
}