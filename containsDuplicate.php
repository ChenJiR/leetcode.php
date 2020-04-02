<?php

/**
 * 217. 存在重复元素
 * Class ContainsDuplicateSolution
 * https://leetcode-cn.com/problems/contains-duplicate/
 */
class ContainsDuplicateSolution
{

    /**
     * 暴力法
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums)
    {
        $set = [];
        foreach ($nums as $n) {
            if (in_array($n, $set)) {
                return true;
            } else {
                $set[] = $n;
            }
        }
        return false;
    }

    /**
     * 排序后遍历 (增加时间复杂度 降低空间复杂度)
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate2($nums)
    {
        sort($nums);
        foreach ($nums as $i => $n) {
            if ($n == (isset($nums[$i + 1]) ? $nums[$i + 1] : $n + 1)) {
                return true;
            }
        }
        return false;
    }
}