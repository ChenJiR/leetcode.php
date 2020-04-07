<?php

/**
 * 26. 删除排序数组中的重复项
 * Class RemoveDuplicatesSolution
 * https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array/
 */
class RemoveDuplicatesSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $j = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] !== $nums[$j]) {
                $j++;
                $nums[$j] = $nums[$i];
            }
        }
        return $j + 1;
    }
}