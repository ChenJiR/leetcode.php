<?php

/**
 * 27. 移除元素
 * Class RemoveElementSolution
 * https://leetcode-cn.com/problems/remove-element/
 */
class RemoveElementSolution
{

    /**
     * 左右双指针交换
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement_1(&$nums, $val)
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            if ($nums[$left] == $val && $nums[$right] != $val) {
                $nums[$left++] = $nums[$right];
                $nums[$right--] = $val;
            } else {
                $nums[$right] == $val ? $right-- : $left++;
            }
        }
        return $left == $right && $nums[$left] == $val ? $right : $right + 1;
    }

    /**
     * 单项双指针
     * 此方法会将不为val的元素集中到数组最前端，但后面的元素不变
     * 因为题目中不要求必须与原数组元素一致，所以符合题意
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement_2(&$nums, $val)
    {
        $i = 0;
        foreach ($nums as $item)
            $item != $val && $nums[$i++] = $item;

        return $i;
    }
}