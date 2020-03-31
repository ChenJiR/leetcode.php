<?php

/**
 * 283. 移动零
 * Class MoveZeroesSolution
 * https://leetcode-cn.com/problems/move-zeroes/
 */
class MoveZeroesSolution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $index = 0;
        $zero_num = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 0) {
                $zero_num++;
            } else {
                $nums[$index] = $nums[$i];
                $index++;
            }
        }
        for ($i = $index; $i < count($nums); $i++) {
            $nums[$i] = 0;
        }
        return $nums;
    }
}