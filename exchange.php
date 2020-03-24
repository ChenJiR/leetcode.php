<?php

/**
 * 1526. 面试题21. 调整数组顺序使奇数位于偶数前面
 * Class ExchangeSolution
 * https://leetcode-cn.com/problems/diao-zheng-shu-zu-shun-xu-shi-qi-shu-wei-yu-ou-shu-qian-mian-lcof/
 */
class ExchangeSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function exchange($nums)
    {
        $a = $b = [];
        foreach ($nums as $n) {
            $n % 2 == 0 ? $b[] = $n : $a[] = $n;
        }
        return array_merge($a, $b);
    }

    /**
     * 快排解法
     * 双指针左加右减遍历，左边遇到偶数停止，右边遇到奇数停止，两边互换位置后继续
     * @param Integer[] $nums
     * @return Integer[]
     */
    function quicksort($nums)
    {
        $right = count($nums) - 1;
        $left = 0;
        while ($left < $right) {
            if ($nums[$left] % 2 == 0 && $nums[$right] % 2 == 1) {
                $tmp = $nums[$left];
                $nums[$left] = $nums[$right];
                $nums[$right] = $tmp;
            }
            if ($nums[$right] % 2 == 0) {
                $right--;
            }
            if ($nums[$left] % 2 == 1) {
                $left++;
            }
        }
        return $nums;
    }
}