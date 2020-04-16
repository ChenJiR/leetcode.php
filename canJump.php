<?php

/**
 * 55. 跳跃游戏
 * Class CanJumpSolution
 * https://leetcode-cn.com/problems/jump-game/
 */
class CanJumpSolution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $i = count($nums) - 1;
        while ($i > 0) {
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($i - $j <= $nums[$j]) {
                    $i = $j;
                    break;
                }
                if ($j == 0) {
                    return false;
                }
            }
        }
        return true;
    }
}