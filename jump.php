<?php

/**
 * 45. 跳跃游戏 II
 * Class JumpSolution
 * https://leetcode-cn.com/problems/jump-game-ii/
 */
class JumpSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums)
    {
        if(count($nums) == 1) return 0;
        $i = 0;
        $res = 1;
        while ($i + $nums[$i] < count($nums) - 1) {
            $max = $i + 1;
            for ($j = $i + 1; $j <= $i + $nums[$i]; $j++) {
                if ($nums[$j] + $j >= $nums[$max] + $max) {
                    $max = $j;
                }
            }
            $i = $max;
            $res++;
        }
        return $res;
    }
}