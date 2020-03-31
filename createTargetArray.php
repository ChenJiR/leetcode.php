<?php

/**
 * 1389. 按既定顺序创建目标数组
 * Class CreateTargetArraySolution
 * https://leetcode-cn.com/problems/create-target-array-in-the-given-order/
 */
class CreateTargetArraySolution
{

    /**
     * 模拟插入
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index)
    {
        $target = [];
        foreach ($index as $i => $target_index) {
            $target_index == count($target)
                ? $target[] = $nums[$i]
                : array_splice($target, $target_index, 0, [$nums[$i]]);
        }
        return $target;
    }
}
