<?php

/**
 * 1498. 面试题03. 数组中重复的数字
 * Class FindRepeatNumberSolution
 * https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/
 */
class FindRepeatNumberSolution
{

    /**
     * 最基础解法 哈希表 效率很低
     * @param Integer[] $nums
     * @return Integer
     */
    function findRepeatNumber($nums)
    {
        $ary = [];
        foreach ($nums as $n) {
            if (in_array($n, $ary)) {
                return $n;
            }
            $ary[] = $n;
        }
    }

    /**
     * 先排序后判断相邻是否相等
     * @param $nums
     * @return mixed
     */
    function findRepeatNumber2($nums)
    {
        sort($nums);
        $prev = null;
        foreach ($nums as $n) {
            if ($prev === $n) {
                return $n;
            }
            $prev = $n;
        }
    }
}
