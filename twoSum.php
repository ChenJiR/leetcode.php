<?php

/**
 * 1. 两数之和
 * 1562. 面试题57. 和为s的两个数字 (有稍微不同 1.输入数组有序 2. 要求输出数字而非下标)
 * Class TwoSumSolution
 * https://leetcode-cn.com/problems/two-sum/
 */
class TwoSumSolution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $result = [];
        foreach ($nums as $r1 => $a) {
            foreach ($nums as $r2 => $b) {
                if ($r1 == $r2) {
                    continue;
                }
                if ($a + $b == $target) {
                    $result = [$r1, $r2];
                    break 2;
                }
            }
        }
        return $result;
    }

    /**
     * 1562 优化解法
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum2($nums, $target)
    {
        $break = intval($target / 2);
        $result = [];
        foreach ($nums as $i => $n) {
            if ($n > $break) {
                break;
            }
            foreach (array_slice($nums, $i) as $n2) {
                if ($n + $n2 > $target) {
                    break;
                }
                if ($n + $n2 == $target) {
                    $result = [$n, $n2];
                    break 2;
                }
            }
        }
        return $result;
    }

    /**
     * 1562 双指针解法
     * 左右两指针分别从数组两端开始遍历，因数组是有序的，所有两端的数值相加大于target则将右指针左移，小于target则左指针右移直到相等
     * 若左右指针碰头后还未找到，则无解返回空数组
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum3($nums, $target)
    {
        $right = count($nums) - 1;
        $left = 0;
        $result = [];
        while ($left < $right) {
            $sum = $nums[$right] + $nums[$left];
            if ($sum > $target) {
                $right--;
            } else if ($sum < $target) {
                $left++;
            } else {
                $result = [$nums[$right], $nums[$left]];
                break;
            }
        }
        return $result;
    }
}